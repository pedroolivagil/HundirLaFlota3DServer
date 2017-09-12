<?php

/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: MarketController.php
 * Date: 13/08/2017 21:48
 */
class MarketController extends _PersistenceManager {

    /**
     * MarketController constructor.
     */
    public function __construct() {
        parent::__construct(TABLE_MARKET);
    }

    public function findById($id) {
        $key = array(
            COL_ID_MARKET => (int)$id
        );
        $result = parent::findOneByKey($key);
        if ($result != NULL) {
            return new Market($result);
        }
        return FALSE;
    }

    public function create(Market $data) {
        $result = FALSE;
        if (Tools::isNotNull($data->getCode())) {
            $key = array(
                COL_CODE        => $data->getCode(),
                COL_FLAG_ACTIVO => TRUE
            );
            $find = parent::exists($key);
            if (Tools::isNull($find)) {
                $idMarket = parent::count() + 1;
                $data->setIdMarket($idMarket);
                $result = parent::persist($data->serialize(array( COL_ID_DOCUMENT, COL_OBJECT )));
            }
        }
        return $result;
    }

    public function update(Market $data) {
        $key = array( COL_ID_MARKET => $data->getIdMarket() );
        return parent::merge($key, $data->serialize(array( COL_OBJECT )));
    }

    public function delete(Market $data) {
        $key = array( COL_ID_MARKET => $data->getIdMarket() );
        return parent::remove($key, $data->serialize(array( COL_OBJECT )));
    }
}