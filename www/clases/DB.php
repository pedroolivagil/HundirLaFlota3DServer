<?php

/**
 * Description of Database
 *
 * @author Oliva
 */

class DB/* extends mysqli */ {

    private static $instance;
    
    private $conexion;
    private $problems;
    
    public static function GetInstance(){
        if(self::$instance == NULL){
            self::$instance = new DB();
        }
        return self::$instance;
    }

    private function setProblems($problems) {
        $this->problems = $problems;
    }

    private function addProblem() {
        $this->problems++;
    }

    private function check() {
        try {
            return $this->conexion->query('SELECT 1');
        } catch (PDOException $e) {
            error_log($e->getMessage());
            $this->init_db();
            // Don't catch exception here, so that re-connect fail will throw exception
            return FALSE;
        }
    }

    private function initConexion() {
        try {
            // Conectar
            $this->conexion = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DB, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8';"));
            // Establecer el nivel de errores a EXCEPTION
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $this->addProblem();
            error_log($e->getMessage());
        }
    }

    public function init_db() {
        $this->setProblems(0);
        $this->initConexion();
    }

    public function close_db() {
        $this->conexion = NULL;
    }

    public function getProblems() {
        return $this->problems;
    }

    public function findAll($table = NULL) {
        $result_final = NULL;
        if ($this->check()) {
            if ($table != NULL) {
                if (($result = $this->conexion->query('SELECT * FROM ' . $table . ' WHERE flag_activo = true;', MYSQLI_USE_RESULT)) !== FALSE) {
                    $result_final = $result->fetchAll(PDO::FETCH_CLASS);
                }
            }
            return json_encode($result_final);
        }
        return NULL;
    }

    public function execute($query = NULL) {
        $result_final = NULL;
        try {
            if ($this->check()) {
                if ($query != NULL && ($result = $this->conexion->query($query, MYSQLI_USE_RESULT)) !== FALSE) {
                    $result_final = $result->fetchAll(PDO::FETCH_CLASS);
                }
            }
        } catch (PDOException $e) {
            $this->addProblem();
            error_log($e->getMessage());
        }
        return $result_final;
    }

    public function preparedQuery($query, $params = NULL) {
        $result_final = NULL;
        try {
            if ($this->check()) {
                if ($query != NULL) {
                    $sentencia = $this->conexion->prepare($query);
                    if ($params != NULL) {
                        $sentencia->execute($params);
                    } else {
                        $sentencia->execute();
                    }
                    $result_final = $sentencia->fetchAll(PDO::FETCH_CLASS);
                }
                return json_decode(json_encode($result_final, TRUE), TRUE);
            }
        } catch (PDOException $e) {
            $this->addProblem();
            error_log($e->getMessage());
        }
        return $result_final;
    }

    public function preparedQueryToJSON($query = NULL, $params = NULL) {
        $result_final = NULL;
        try {
            if ($this->check()) {
                if ($query != NULL && $params != NULL) {
                    $sentencia = $this->conexion->prepare($query);
                    $sentencia->execute($params);
                    $result_final = $sentencia->fetchAll(PDO::FETCH_CLASS);
                } else if ($query != NULL && $params == NULL) {
                    $sentencia = $this->conexion->prepare($query);
                    $sentencia->execute();
                    $result_final = $sentencia->fetchAll(PDO::FETCH_CLASS);
                }
                return json_encode($result_final);
            }
        } catch (PDOException $e) {
            $this->addProblem();
            error_log($e->getMessage());
        }
        return $result_final;
    }

    public function begin_trans() {
        if ($this->check()) {
            try {
                return $this->conexion->beginTransaction();
            } catch (PDOException $e) {
                $this->addProblem();
                error_log($e->getMessage());
                return FALSE;
            }
        }
    }

    public function commit_trans() {
        if ($this->check()) {
            try {
                return $this->conexion->commit();
            } catch (PDOException $e) {
                $this->addProblem();
                error_log($e->getMessage());
                return FALSE;
            }
        }
    }

    public function rollBack_trans() {
        if ($this->check()) {
            try {
                return $this->conexion->rollBack();
            } catch (PDOException $e) {
                $this->addProblem();
                error_log($e->getMessage());
                return FALSE;
            }
        }
    }

    public function insert($arrayFieldsValues, $table) {
        if ($this->check()) {
            try {
                $claves = array_keys($arrayFieldsValues);
                $values = array_values($arrayFieldsValues);
                $sentencia = $this->conexion->prepare("INSERT INTO " . $table . "(" . implode(",", $claves) . ") VALUES('" . implode("','", $values) . "');");
                $sentencia->execute();
                return TRUE;
            } catch (PDOException $e) {
                $this->addProblem();
                error_log($e->getMessage());
                return FALSE;
            }
        }
    }

    public function update($table, $newValues, $params = null, $strict = true) {
        if ($this->check()) {
            try {
                $set = " SET ";
                if ($newValues != null) {
                    $claves = array_keys($newValues);
                    $values = array_values($newValues);
                    $set .= "";
                    for ($x = 0; $x < count($claves); $x++) {
                        $set .= $claves[$x] . " = '" . $values[$x] . "'";
                        if ($x >= 0 && $x < count($claves) - 1) {
                            $set .= ", ";
                        }
                    }
                    $where = "";
                    if ($params != null) {
                        $claves = array_keys($params);
                        $values = array_values($params);
                        $where .= "WHERE ";
                        for ($x = 0; $x < count($claves); $x++) {
                            $where .= $claves[$x] . " LIKE '" . $values[$x] . "'";
                            if ($x >= 0 && $x < count($claves) - 1) {
                                if ($strict) {
                                    $where .= " AND ";
                                } else {
                                    $where .= " OR ";
                                }
                            }
                        }
                    }
                    $sentencia = $this->conexion->prepare("UPDATE " . $table . " " . $set . " " . $where . ";");
                    $sentencia->execute();
                    return TRUE;
                } else {
                    return FALSE;
                }
            } catch (PDOException $e) {
                $this->addProblem();
                error_log($e->getMessage());
                return FALSE;
            }
        }
    }

    public function deleteLogic($table, $newValues, $params = null, $strict = true) {
        if ($this->check()) {
            try {
                $set = " SET ";
                if ($newValues != null) {
                    $claves = array_keys($newValues);
                    $values = array_values($newValues);
                    $set .= "";
                    for ($x = 0; $x < count($claves); $x++) {
                        $set .= $claves[$x] . " = '" . $values[$x] . "'";
                        if ($x >= 0 && $x < count($claves) - 1) {
                            $set .= ", ";
                        }
                    }
                    $where = "";
                    if ($params != null) {
                        $claves = array_keys($params);
                        $values = array_values($params);
                        $where .= "WHERE ";
                        for ($x = 0; $x < count($claves); $x++) {
                            $where .= $claves[$x] . " LIKE '" . $values[$x] . "'";
                            if ($x >= 0 && $x < count($claves) - 1) {
                                if ($strict) {
                                    $where .= " AND ";
                                } else {
                                    $where .= " OR ";
                                }
                            }
                        }
                    }
                    $sentencia = $this->conexion->prepare("UPDATE " . $table . " " . $set . " " . $where . ";");
                    $sentencia->execute();
                    return TRUE;
                } else {
                    return FALSE;
                }
            } catch (PDOException $e) {
                $this->addProblem();
                error_log($e->getMessage());
                return FALSE;
            }
        }
    }

    public function delete($table, $params = null, $strict = true) {
        if ($this->check()) {
            try {
                $where = "";
                if ($params != null) {
                    $claves = array_keys($params);
                    $values = array_values($params);
                    $where .= "WHERE ";
                    for ($x = 0; $x < count($claves); $x++) {
                        $where .= $claves[$x] . " LIKE '" . $values[$x] . "'";
                        if ($x > 0 && $x < count($claves) - 1) {
                            if ($strict) {
                                $where .= " AND ";
                            } else {
                                $where .= " OR ";
                            }
                        }
                    }
                }
                $sentencia = $this->conexion->prepare("DELETE FROM " . $table . " " . $where . ";");
                $sentencia->execute();
                return TRUE;
            } catch (PDOException $e) {
                $this->addProblem();
                error_log($e->getMessage());
                return FALSE;
            }
        }
    }

    public function logger($action = "", $coment = "", $user = "") {
        if ($this->check()) {
            try {
                $sentencia = $this->conexion->prepare("INSERT INTO " . TABLE_ERROR_LOG . "(accion, id_usuario, comentario) VALUES('$action','$user','$coment');");
                $sentencia->execute();
            } catch (PDOException $e) {
                $this->addProblem();
                error_log($e->getMessage());
            }
        }
    }

}
