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
        parent::__construct(TABLE_USER);
    }

    public function findById($id) {
        $key = array(
            COL_ID_USER => $id
        );
        $result = parent::findOneByKey($key);
        if ($result != NULL) {
            return new User($result);
        }
        return FALSE;
    }

    public function findAllByUsername($username) {
        $key = array(
            COL_USERNAME => $username
        );
        return parent::findByKey($key);
    }

    public function create($data) {
        $key = array(
            COL_USERNAME => $data->getUsername()
        );
        $find = parent::findOneByKey($key);
        if ($find == NULL) {
            $total = parent::count();
            $data->setIdUser($total + 1);
            $data->setSignupDate(time());
            $data->setFlagActive(TRUE);
            $data->setInfo((array) json_decode($data->getInfo()->serialize(), TRUE));
            return parent::persist($data->serialize(array(COL_ID_DOCUMENT, COL_OBJECT)));
        }
        return FALSE;
    }

    public function update($data) {
        $key = array(COL_ID_USER => $data->getIdUser());
        return parent::merge($key, $data->serialize(array(COL_OBJECT)));
    }

    public function delete($data) {
        $key = array(COL_ID_USER => $data->getIdUser());
        return parent::remove($key, $data->serialize(array(COL_OBJECT)));
    }

}
