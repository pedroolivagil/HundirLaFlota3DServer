<?php

/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: BankController.php
 * Date: 13/08/2017 21:48
 */
class BankController extends _PersistenceManager {

    /**
     * BankController constructor.
     */
    public function __construct() {
        parent::__construct(TABLE_BANK);
    }

    public function findById($id) {
        $key = array(
            COL_ID_BANK => (int)$id
        );
        $result = parent::findOneByKey($key);
        if ($result != NULL) {
            return new Bank($result);
        }
        return FALSE;
    }

    public function create(Bank $data) {
        $result = FALSE;
        if (Tools::isNotNull($data->getCode())) {
            $key = array(
                COL_CODE        => $data->getCode(),
                COL_FLAG_ACTIVO => TRUE
            );
            $find = parent::exists($key);
            if (Tools::isNull($find)) {
                $idBank = parent::count() + 1;
                $data->setIdBank($idBank);
                $result = parent::persist($data->serialize(array( COL_ID_DOCUMENT, COL_OBJECT )));
            }
        }
        return $result;
    }

    public function update(Bank $data) {
        $key = array( COL_ID_BANK => $data->getIdBank() );
        return parent::merge($key, $data->serialize(array( COL_OBJECT )));
    }

    public function delete(Bank $data) {
        $key = array( COL_ID_BANK => $data->getIdBank() );
        return parent::remove($key, $data->serialize(array( COL_OBJECT )));
    }
}