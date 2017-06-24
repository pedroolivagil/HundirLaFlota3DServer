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
        $this->fecha_alta = $arrayValues['fecha_alta'];
    }

    public function getId() {
        return $this->_id;
    }

    public function getIdUser() {
        return $this->id_user;
    }

    public function getFlagActivo() {
        return $this->flag_activo;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getFechaAlta() {
        return $this->fecha_alta;
    }

    public function setIdUser($id_user) {
        $this->id_user = $id_user;
    }

    public function setFlagActivo($flag_activo) {
        $this->flag_activo = $flag_activo;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setFechaAlta($fecha_alta) {
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
