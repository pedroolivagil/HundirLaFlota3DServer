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
class UserController extends _PersistenceManager {

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
        if (!is_null($data)) {
            $total = parent::count();
            $data->setIdUser($total + 1);
            $data->setFechaAlta(time());
            return parent::persist($data->serialize(array(COL_ID_DOCUMENT, COL_OBJECT)));
        }
    }

    public function update($data = NULL) {
        if (!is_null($data)) {
            $key = array(COL_ID_USER => $data->getIdUser());
            return parent::merge($key, $data->serialize(array(COL_OBJECT)));
        }
    }

    public function delete($data = NULL) {
        if (!is_null($data)) {
            $key = array(COL_ID_USER => $data->getIdUser());
            return parent::remove($key, $data->serialize(array(COL_OBJECT)));
        }
    }
}
