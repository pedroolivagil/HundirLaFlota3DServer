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
class IdiomaController extends _PersistenceManager {

    public function __construct() {
        parent::__construct(TABLE_APP_LOCALE);
    }

    public function findById($id) {
        $key = array(
            COL_ID_IDIOMA => $id
        );
        $result = parent::findOneByKey($key);
        return new Idioma($result);
    }

    public function create($data) {
        $key = array(
            COL_CODIGO_ISO => $data->getCodigoISO(),
            COL_FLAG_ACTIVO => TRUE
        );
        $find = parent::findOneByKey($key);
        if (is_null($find)) {
            $idIdioma = parent::count() + 1;
            $data->setIdIdioma($idIdioma);
            $data->setFechaAlta(time());
            $data->setFlagActivo(TRUE);
            return parent::persist($data->serialize(array(COL_ID_DOCUMENT, COL_OBJECT)));
        }
        return FALSE;
    }

    public function update($data) {
        $key = array(COL_ID_IDIOMA => $data->getIdIdioma());
        return parent::merge($key, $data->serialize(array(COL_OBJECT)));
    }

    public function delete($data) {
        $key = array(COL_ID_IDIOMA => $data->getIdIdioma());
        return parent::remove($key, $data->serialize(array(COL_OBJECT)));
    }

}
