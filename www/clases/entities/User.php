<?php

/**
 * Description of User
 *
 * @author 0013856
 */
class User extends PersistenceManager implements BasicMethodsEntities {

    private $id_usuario;
    private $correo;
    private $username;
    private $password;
    private $fecha_alta;
    private $fullname;
    private $birth_date;
    private $flag_activo;
    private $nif;
    private $telefono;
    private $id_pais;
    private $poblacion;

    function __construct() {
        parent::__construct();
        parent::getEm();
    }

    public function create() {
        return parent::getEm()->create($this->toArray(), TABLE_USUARIO);
    }

    public function update() {
        $id = array(COL_ID_USUARIO => $this->getId_usuario());
        return parent::getEm()->update(TABLE_USUARIO, $this->toArray(), $id);
    }

    public function delete() {
        $id = array(COL_ID_USUARIO => $this->getId_usuario());
        return parent::getEm()->delete(TABLE_USUARIO, $this->toArray(), $id);
    }

    public function findById($id, $active = true) {
        /* return User with user id data */
        $params = array(
            COL_ID_USUARIO => $id,
            COL_FLAG_ACTIVO => $active
        );
        $usuario = DB::GetInstance()->preparedQuery(UsuarioFindById, $params);
        if ($usuario != NULL) {
            return FALSE;
        }
        return new User($usuario[0][COL_ID_USUARIO], $usuario[0]['username'], $usuario[0]['correo'], $usuario[0]['password'], $usuario[0]['fullname'], $usuario[0]['nif'], $usuario[0]['birth_date'], $usuario[0]['telefono'], $usuario[0]['id_pais'], $usuario[0]['poblacion'], $usuario[0]['flag_activo'], $usuario[0]['fecha_alta']);
    }

    public function findByUserName($username, $active = true) {
        /* return User with user id data */
        if ($username == NULL) {
            return FALSE;
        }
        $params = array(
            COL_USERNAME => strtolower(trim($username)),
            COL_FLAG_ACTIVO => $active
        );
        var_dump($params);
        var_dump(UsuarioFindByUserName);
        $usuario = parent::getEm()->findByParam(UsuarioFindByUserName, $params);
        if ($usuario == NULL) {
            return FALSE;
        }
        $this->setId_usuario($usuario[0][COL_ID_USUARIO]);
        $this->setBirth_date($usuario[0]['birth_date']);
        $this->setCorreo($usuario[0]['correo']);
        $this->setFecha_alta($usuario[0]['fecha_alta']);
        $this->setFlag_activo($usuario[0]['flag_activo']);
        $this->setFullname($usuario[0]['fullname']);
        $this->setId_pais($usuario[0]['id_pais']);
        $this->setNif($usuario[0]['nif']);
        $this->setPoblacion($usuario[0]['poblacion']);
        $this->setTelefono($usuario[0]['telefono']);
        $this->setUsername($usuario[0]['username']);
        $this->setUser_pass($usuario[0]['password']);
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function getUsername() {
        return $this->username;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getUser_pass() {
        return $this->password;
    }

    function getFecha_alta() {
        return $this->fecha_alta;
    }

    function getFlag_activo() {
        return $this->flag_activo;
    }

    function getNif() {
        return $this->nif;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getId_pais() {
        return $this->id_pais;
    }

    function getPoblacion() {
        return $this->poblacion;
    }

    function getBirth_date() {
        return $this->birth_date;
    }

    function getFullname() {
        return $this->fullname;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = parent::updateField($this->id_usuario, $id_usuario);
    }

    function setUsername($username) {
        $this->username = parent::updateField($this->username, $username);
    }

    function setCorreo($correo) {
        $this->correo = parent::updateField($this->correo, $correo);
    }

    function setUser_pass($password) {
        $this->password = parent::updateField($this->password, $password);
    }

    function setFecha_alta($fecha_alta) {
        $this->fecha_alta = parent::updateField($this->fecha_alta, $fecha_alta);
    }

    function setFlag_activo($flag_activo) {
        $this->flag_activo = parent::updateField($this->flag_activo, $flag_activo);
    }

    function setNif($nif) {
        $this->nif = parent::updateField($this->nif, $nif);
    }

    function setTelefono($telefono) {
        $this->telefono = parent::updateField($this->telefono, $telefono);
    }

    function setId_pais($id_pais) {
        if (is_null($id_pais)) {
            $id_pais = 0;
        }
        $this->id_pais = $id_pais;
    }

    function setPoblacion($poblacion) {
        $this->poblacion = parent::updateField($this->poblacion, $poblacion);
    }

    function setBirth_date($birth_date) {
        $this->birth_date = parent::updateField($this->birth_date, $birth_date);
    }

    function setFullname($fullname) {
        $this->fullname = parent::updateField($this->fullname, $fullname);
    }

    public function toArray() {
        return get_object_vars($this);
    }

    public function toJSON() {
        return get_object_vars($this);
    }

}
