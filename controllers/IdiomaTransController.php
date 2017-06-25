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
class IdiomaTransController extends _PersistenceManager {

    public function __construct() {
        parent::__construct(TABLE_IDIOMA_TRANS);
    }

    public function findById($id) {
        $key = array(
            COL_ID_IDIOMA => $id
        );
        $result = parent::findOneByKey($key);
        return new IdiomaTrans($result);
    }

    public function create($data) {
        $key = array(
            COL_TEXTO => $data->getTexto()
        );
        $find = parent::findOneByKey($key);
        if ($find == NULL) {
            $total = parent::count();
            $data->setIdIdioma($total + 1);
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
