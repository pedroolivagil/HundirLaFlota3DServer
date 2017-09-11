<?php

/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: InventoryController.php
 * Date: 13/08/2017 21:48
 */
class InventoryController extends _PersistenceManager {

    /**
     * InventoryController constructor.
     */
    public function __construct() {
        parent::__construct(TABLE_INVENTORY);
    }

    public function findById($id) {
        $key = array(
            COL_ID_INVENTORY => $id
        );
        $result = parent::findOneByKey($key);
        if ($result != NULL) {
            return new Inventory($result);
        }
        return FALSE;
    }

    public function create(Inventory $data) {
        $result = FALSE;
        if (Tools::isNotNull($data->getCode())) {
            $key = array(
                COL_CODE        => $data->getCode(),
                COL_FLAG_ACTIVO => TRUE
            );
            $find = parent::exists($key);
            if (Tools::isNull($find)) {
                $idInventory = parent::count() + 1;
                $data->setIdInventory($idInventory);
                $result = parent::persist($data->serialize(array( COL_ID_DOCUMENT, COL_OBJECT )));
            }
        }
        return $result;
    }

    public function update(Inventory $data) {
        $key = array( COL_ID_INVENTORY => $data->getIdInventory() );
        return parent::merge($key, $data->serialize(array( COL_OBJECT )));
    }

    public function delete(Inventory $data) {
        $key = array( COL_ID_INVENTORY => $data->getIdInventory() );
        return parent::remove($key, $data->serialize(array( COL_OBJECT )));
    }
}