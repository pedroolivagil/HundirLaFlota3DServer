<?php

/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: LocaleAppController.php
 * Date: 09/08/2017 02:48
 */
class LocaleAppController extends _PersistenceManager {

    public function __construct() {
        parent::__construct(TABLE_APP_LOCALE);
    }

    public function findById($id) {
        $key = array(
            COL_ID_IDIOMA => $id
        );
        $result = parent::findOneByKey($key);
        if ($result != NULL) {
            return new LocaleApp($result);
        }
        return FALSE;
    }

    public function create(LocaleApp $data) {
        $key = array(
            COL_CODIGO_ISO  => strtoupper($data->getCodeISO()),
            COL_FLAG_ACTIVO => TRUE
        );
        $find = parent::exists($key);
        if (is_null($find)) {
            $idIdioma = parent::count() + 1;
            $data->setCodeISO($data->getCodeISO());
            $data->setIdLocale($idIdioma);
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

    public function update(LocaleApp $data) {
        $key = array( COL_ID_IDIOMA => $data->getIdLocale() );
        return parent::merge($key, $data->serialize(array( COL_OBJECT )));
    }

    public function delete(LocaleApp $data) {
        $key = array( COL_ID_IDIOMA => $data->getIdLocale() );
        return parent::remove($key, $data->serialize(array( COL_OBJECT )));
    }
}
