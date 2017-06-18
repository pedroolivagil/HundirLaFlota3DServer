<?php

/**
 * Maneja las conexiones y ejecuta las operaciones en la BBDD
 *
 * @author Oliva
 */
class DB {

    private static $instance;
    private $manager;

    public static function getInstance() {
        if (Tools::isNotNull($manager)) {
            $instance = new DB();
        }
        return $instance;
    }

    public function getManager() {
        return $this->manager;
    }

    private function __construct() {
        $uri = "mongodb://" . DB_USER . ":" . DB_PASSWORD . "@" . DB_HOST . ":" . DB_PORT . "/" . DB_DB;
        $this->manager = new MongoClient($uri);
    }

    /**
     * Crea un documento en la colección
     * @param type string $collection
     * @param type array $data
     * @return boolean
     */
    public function create($collection = NULL, &$data = NULL) {
        try {
            if (Tools::isNull($collection) or Tools::isNull($data)) {
                return FALSE;
            }
            $colection = $this->manager->selectCollection(DB_DB, $collection);
            return $colection->insert($data);
        } catch (Exception $e) {
            return FALSE;
        }
    }

    /**
     * Borra un documento de manera superficial. Solo desactiva el documento con un bool
     * @param type string $collection
     * @param type array $key
     * @return boolean
     */
    public function delete($collection = NULL, &$key = NULL) {
        try {
            if (Tools::isNull($collection) or Tools::isNull($key)) {
                return FALSE;
            }
            $colection = $this->manager->selectCollection(DB_DB, $collection);
            $flagFalse = array('$set' => array(FLAG_ACTIVO => FALSE));
            return $colection->update($key, $flagFalse);
        } catch (Exception $e) {
            return FALSE;
        }
    }

    public function find() {
        
    }

    public function findByKey($key) {
        
    }

    /**
     * Hac un update el documento seleccionado
     * @param type $collection
     * @param type array $key
     * @param type array $newData
     * @return boolean
     */
    public function update($collection = NULL, &$key = NULL, $newData = NULL) {
        try {
            if (Tools::isNull($collection) or Tools::isNull($key) or Tools::isNull($newDate)) {
                return FALSE;
            }
            $colection = $this->manager->selectCollection(DB_DB, $collection);
            $flagFalse = array('$set' => $newData);
            return $colection->update($key, $flagFalse);
        } catch (Exception $e) {
            return FALSE;
        }
    }

}
