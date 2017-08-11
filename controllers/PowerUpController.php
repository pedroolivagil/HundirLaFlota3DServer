<?php

/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: PowerUpController.php
 * Date: 09/08/2017 02:48
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

    public function create(PowerUp $data) {
        $key = array(
            COL_CODE        => $data->getCode(),
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
                $data->addTrans($loc->asArray());
            }
            return parent::persist($data->serialize(array( COL_ID_DOCUMENT, COL_OBJECT )));
        }
        return FALSE;
    }

    public function update(PowerUp $data) {
        $key = array( COL_ID_POWERUP => $data->getIdLocale() );
        return parent::merge($key, $data->serialize(array( COL_OBJECT )));
    }

    public function delete(PowerUp $data) {
        $key = array( COL_ID_POWERUP => $data->getIdLocale() );
        return parent::remove($key, $data->serialize(array( COL_OBJECT )));
    }
}
