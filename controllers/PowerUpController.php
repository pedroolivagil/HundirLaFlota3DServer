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
class PowerUpController extends _PersistenceManager {

    public function __construct() {
        parent::__construct(TABLE_POWERUP);
    }

    public function findById($id) {
        $key = array(
            COL_ID_POWERUP => $id
        );
        $result = parent::findOneByKey($key);
        if ($result != NULL) {
            return new PowerUp($result);
        }
        return FALSE;
    }

    public function create($data) {
        $key = array(
            COL_CODE => $data->getCode(),
            COL_FLAG_ACTIVO => TRUE
        );
        $find = parent::exists($key);
        if (is_null($find)) {
            $idIdioma = parent::count() + 1;
            $data->setIdPowerup($idIdioma);
            $data->setAddDate(time());
            $data->setFlagActive(TRUE);
            $trans = $data->getTrans();
            $data->setTrans(NULL);
            foreach ($trans as $loc) {
                $data->addTrans($loc->serialize());
            }
            return parent::persist($data->serialize(array(COL_ID_DOCUMENT, COL_OBJECT)));
        }
        return FALSE;
    }

    public function update($data) {
        $key = array(COL_ID_POWERUP => $data->getIdLocale());
        return parent::merge($key, $data->serialize(array(COL_OBJECT)));
    }

    public function delete($data) {
        $key = array(COL_ID_POWERUP => $data->getIdLocale());
        return parent::remove($key, $data->serialize(array(COL_OBJECT)));
    }

}
