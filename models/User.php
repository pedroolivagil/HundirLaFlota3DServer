<?php

/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: User.php
 * Date: 09/08/2017 02:48
 */
class User extends _EntitySerialize {

    private $_id;
    private $id_user;
    private $flag_active;
    private $email_activation;      // True si el usuario tiene el email verificado
    private $add_date;
    private $username;
    private $password;
    private $email;
    private $type_user;
    private $info;      // array with user info

    public function __construct1($arrayValues) {
        $this->init($arrayValues, FALSE);
    }

    public function __construct2($arrayValues, $full = TRUE) {
        $this->init($arrayValues, $full);
    }

    private function init($arrayValues, $full = TRUE) {
        $this->_id = $arrayValues[ '_id' ];
        $this->id_user = (int)$arrayValues[ 'id_user' ];
        $this->flag_active = (bool)$arrayValues[ 'flag_active' ];
        $this->email_activation = (bool)$arrayValues[ 'email_activation' ];
        $this->username = $arrayValues[ 'username' ];
        $this->password = $arrayValues[ 'password' ];
        $this->email = $arrayValues[ 'email' ];
        $this->type_user = (int)$arrayValues[ 'type_user' ];
        $this->add_date = $arrayValues[ 'signup_date' ];
        if ($full) {
            $this->info = new UserInfo($arrayValues[ 'info' ]);
        }
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

    public function getAddDate() {
        return $this->add_date;
    }

    public function getInfo() {
        return $this->info;
    }

    public function getEmailActivation() {
        return $this->email_activation;
    }

    public function getTypeUser() {
        return $this->type_user;
    }

    public function setTypeUser($type_user) {
        $this->type_user = $type_user;
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

    public function setAddDate($add_date) {
        $this->add_date = $add_date;
    }

    public function criptPass() {
        $this->password = Tools::cryptString($this->password);
    }

    /**
     *
     * @param type $propsUnserialized Array de nombre de propiedades a excluir
     * @return type
     */
    public function serialize($propsUnserialized = NULL) {
        $properties = get_object_vars($this);
        if (!is_null($propsUnserialized)) {
            foreach ($propsUnserialized as $property) {
                unset($properties[ $property ]);
            }
        }
        parent::setObject($properties);
        return parent::serialize();
    }
}
