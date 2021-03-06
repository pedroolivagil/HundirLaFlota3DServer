<?php

/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: UserController.php
 * Date: 09/08/2017 02:48
 */
class UserController extends _PersistenceManager {

    public function __construct() {
        parent::__construct(TABLE_USER);
    }

    public function findById($id) {
        $obj = NULL;
        $key = array(
            COL_ID_USER => (int)$id
        );
        $result = parent::findOneByKey($key);
        if ($result != NULL) {
            $obj = new User($result);
        }
        return $obj;
    }

    public function findAllByUsername($username) {
        $key = array(
            COL_USERNAME => $username
        );
        $all = array();
        $result = parent::findByKey($key);
        foreach ($result as $item) {
            array_push($all, new User($item, TRUE));
        }
        return $all;
    }

    public function findAllByEmail($email) {
        $key = array(
            COL_EMAIL => $email
        );
        $all = array();
        $result = parent::findByKey($key);
        foreach ($result as $item) {
            array_push($all, new User($item, TRUE));
        }
        return $all;
    }

    public function create(User $data) {
        $result = FALSE;
        if (Tools::isNotNull($data->getUsername())) {
            $key = array(
                COL_USERNAME => $data->getUsername()
            );
            $key2 = array(
                COL_EMAIL => $data->getEmail()
            );
            $find = parent::exists($key);
            $find2 = parent::exists($key2);
            if (Tools::isNull($find) && Tools::isNull($find2)) {
                $total = parent::count();
                $data->setIdUser($total + 1);
                $data->setAcountActive(FALSE);
                $data->setTypeUser(2);
                $result = parent::persist($data->serialize(array( COL_ID_DOCUMENT, COL_OBJECT )));
            }
        }
        return $result;
    }

    public function update(User $data) {
        $key = array( COL_ID_USER => $data->getIdUser() );
        return parent::merge($key, $data->serialize(array( COL_OBJECT )));
    }

    public function delete(User $data) {
        $key = array( COL_ID_USER => $data->getIdUser() );
        return parent::remove($key, $data->serialize(array( COL_OBJECT )));
    }
}
