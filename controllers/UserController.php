<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserController
 *
 * @author Oliva
 */
class UserController extends _PersistenseManager {

    public function __construct() {
        parent::__construct('usuarios');
    }

    public function findById($id) {
        $key = array(
            COL_ID_USER => $id
        );
        $result = parent::findByKey($key);
        $retorno = array();
        foreach ($result as $document) {
            array_push($retorno, $document);
        }
        return new User($retorno[0]);
    }

    public function create(&$data = NULL) {
        if (Tools::isNotNull($data)) {
            $data
            parent::persist($data);
        }
    }

    public function update($id, $newData = NULL) {
        $key = array(
            COL_ID_USER => $id
        );
        return parent::merge($key, $newData);
    }

}
