<?php

/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: ItemController.php
 * Date: 13/08/2017 21:48
 */
class ItemController extends _PersistenceManager {

    /**
     * ItemController constructor.
     */
    public function __construct() {
        parent::__construct(TABLE_ITEM);
    }

    public function findById($id) {
        $key = array(
            COL_ID_ITEM => (int)$id
        );
        $result = parent::findOneByKey($key);
        if ($result != NULL) {
            return new Item($result);
        }
        return FALSE;
    }

    public function create(Item $data) {
        $result = FALSE;
        if (Tools::isNotNull($data->getCode())) {
            $key = array(
                COL_CODE        => $data->getCode(),
                COL_FLAG_ACTIVO => TRUE
            );
            $find = parent::exists($key);
            if (Tools::isNull($find)) {
                $idItem = parent::count() + 1;
                $data->setIdItem($idItem);
                $trans = $data->getTrans();
                $data->setTrans(NULL);
                foreach ($trans as $loc) {
                    $data->addTrans($loc->asArray());
                }
                $result = parent::persist($data->serialize(array( COL_ID_DOCUMENT, COL_OBJECT )));
            }
        }
        return $result;
    }

    public function update(Item $data) {
        $key = array( COL_ID_ITEM => $data->getIdItem() );
        return parent::merge($key, $data->serialize(array( COL_OBJECT )));
    }

    public function delete(Item $data) {
        $key = array( COL_ID_ITEM => $data->getIdItem() );
        return parent::remove($key, $data->serialize(array( COL_OBJECT )));
    }
}