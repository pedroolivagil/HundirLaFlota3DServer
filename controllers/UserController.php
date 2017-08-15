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
        return parent::findByKey($key);
    }

    public function create(User $data) {
        $result = FALSE;
        if (Tools::isNotNull($data->getUsername())) {
            $key = array(
                COL_USERNAME => $data->getUsername()
            );
            $find = parent::exists($key);
            if (Tools::isNull($find)) {
                $total = parent::count();
                $data->setIdUser($total + 1);
                $data->setEmailActivation(FALSE);
                if (Tools::isNotNull($data->getInfo())) {
                    $info = $data->getInfo()->asArray();
                    unset($info[ '_id' ]);
                    $data->setInfo($info);
                }
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
