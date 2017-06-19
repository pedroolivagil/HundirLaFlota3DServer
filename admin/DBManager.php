<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBManager
 *
 * @author Oliva
 */
class DBManager extends DB {

    public function createCollection($collectionName) {
        return parent::persistCollection($collectionName);
    }

    public function dropCollection($collectionName) {
        parent::removeCollection($collectionName);
    }

}
