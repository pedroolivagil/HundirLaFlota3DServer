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
class ShipController extends _PersistenceManager {

    public function __construct() {
        parent::__construct(TABLE_SHIP);
    }

    public function findById($id) {
        $key = array(
            COL_ID_SHIP => $id
        );
        $result = parent::findOneByKey($key);
        return new Ship($result);
    }

    public function create($data) {
        $key = array(
            COL_SHIPCODE => $data->getCode()
        );
        $find = parent::findOneByKey($key);
        if ($find == NULL) {
            $total = parent::count();
            $data->setIdShip($total + 1);
            $data->setFechaAlta(time());
            $data->setFlagActivo(TRUE);
            return parent::persist($data->serialize(array(COL_ID_DOCUMENT, COL_OBJECT)));
        }
        return FALSE;
    }

    public function update($data) {
        $key = array(COL_ID_SHIP => $data->getIdShip());
        return parent::merge($key, $data->serialize(array(COL_OBJECT)));
    }

    public function delete($data) {
        $key = array(COL_ID_SHIP => $data->getIdShip());
        return parent::remove($key, $data->serialize(array(COL_OBJECT)));
    }

}
