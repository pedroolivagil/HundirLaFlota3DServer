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

    function __construct($id_usuario, $username, $correo, $password, $fullname, $nif = null, $birth_date = null, $telefono = null, $id_pais = null, $poblacion = null, $flag_activo = NULL, $fecha_alta = NULL) {
        parent::__construct();
        $this->id_usuario = Tools::toNull($id_usuario);
        $this->username = Tools::toNull($username);
        $this->correo = Tools::toNull($correo);
        $this->password = Tools::toNull($password);
        $this->fecha_alta = Tools::toNull($fecha_alta);
        $this->flag_activo = Tools::toNull($flag_activo);
        $this->nif = Tools::toNull($nif);
        $this->fullname = Tools::toNull($fullname);
        $this->birth_date = Tools::toNull($birth_date);
        $this->telefono = Tools::toNull($telefono);
        $this->setId_pais(Tools::toNull($id_pais));
        $this->poblacion = Tools::toNull($poblacion);
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

    public static function findById($id, $active = true) {
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

    public static function findByUserName($username, $active = true) {
        /* return User with user id data */
        $params = array(
            COL_USERNAME => strtolower(trim($username)),
            COL_FLAG_ACTIVO => $active
        );
        $usuario = DB::GetInstance()->preparedQuery(UsuarioFindByUserName, $params);
        if ($usuario != NULL) {
            return FALSE;
        }
        return new User($usuario[0][COL_ID_USUARIO], $usuario[0]['username'], $usuario[0]['correo'], $usuario[0]['password'], $usuario[0]['fullname'], $usuario[0]['nif'], $usuario[0]['birth_date'], $usuario[0]['telefono'], $usuario[0]['id_pais'], $usuario[0]['poblacion'], $usuario[0]['flag_activo'], $usuario[0]['fecha_alta']);
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
