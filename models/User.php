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
}
