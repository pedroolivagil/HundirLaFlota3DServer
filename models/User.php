<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Oliva
 */
class User extends _EntitySerialize {

    private $_id;
    private $id_user;
    private $flag_activo;
    private $fecha_alta;
    private $username;
    private $password;
    private $email;

    public function __construct1($arrayValues) {
        $this->_id = $arrayValues['_id'];
        $this->id_user = $arrayValues['id_user'];
        $this->flag_activo = $arrayValues['flag_activo'];
        $this->username = $arrayValues['username'];
        $this->password = $arrayValues['pass'];
        $this->email = $arrayValues['email'];
    }

    function getId() {
        return $this->_id;
    }

    function getIdUser() {
        return $this->id_user;
    }

    function getFlagActivo() {
        return $this->flag_activo;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getEmail() {
        return $this->email;
    }

    function getFechaAlta() {
        return $this->fecha_alta;
    }

    function setIdUser($id_user) {
        $this->id_user = $id_user;
    }

    function setFlagActivo($flag_activo) {
        $this->flag_activo = $flag_activo;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setFechaAlta($fecha_alta) {
        $this->fecha_alta = $fecha_alta;
    }

    /**
     * 
     * @param type $propsUnserialized Array de nombre de propiedades a excluir
     * @return type
     */
    public function serialize($propsUnserialized = null) {
        $properties = get_object_vars($this);
        if (Tools::isNotNull($propsUnserialized)) {
            foreach ($propsUnserialized as $property) {
                unset($properties[$property]);
            }
        }
        parent::setObject($properties);
        return parent::serialize();
    }

}
