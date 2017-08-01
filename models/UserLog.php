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
class UserLog extends _EntitySerialize {

    private $_id;
    private $log_date;      // fecha del log
    private $author;        // ID del usuario que realiza la acción
    private $author_ip;     // la IP del usuario que realiza la acción
    private $author_range;  // el rango del usuario que realiza la acción
    private $author_cause;  // causa por la que se efectua el cambio
    private $to_user;       // el usuario afectado
    private $action;        // la acción realizada
    private $new_value;     // el nuevo valor, si lo hay
    private $old_value;     // el viejo valor, si ha sido cambiado

    public function __construct1($arrayValues) {
        $this->_id = $arrayValues['_id'];
        $this->id_user = $arrayValues['id_user'];
        $this->flag_active = $arrayValues['flag_active'];
        $this->email_activation = $arrayValues['email_activation'];
        $this->username = $arrayValues['username'];
        $this->password = $arrayValues['pass'];
        $this->email = $arrayValues['email'];
        $this->signup_date = $arrayValues['signup_date'];
        $this->info = new UserInfo($arrayValues['info']);
    }

    public function getId() {
        return $this->_id;
    }

    public function getIdUser() {
        return $this->id_user;
    }

    public function getFlagActive() {
        return $this->flag_active;
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

    public function getSignupDate() {
        return $this->signup_date;
    }

    public function getInfo() {
        return $this->info;
    }

    public function getEmailActivation() {
        return $this->email_activation;
    }

    public function setEmailActivation($email_activation) {
        $this->email_activation = $email_activation;
    }

    public function setInfo($info) {
        $this->info = $info;
    }

    public function setIdUser($id_user) {
        $this->id_user = $id_user;
    }

    public function setFlagActive($flag_active) {
        $this->flag_active = $flag_active;
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

    public function setSignupDate($signup_date) {
        $this->signup_date = $signup_date;
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
