<?php

/**
 * Created by PhpStorm.
 * User: Oliva
 * Date: 04/08/2017
 * Time: 19:48
 */
class Scenario extends _EntitySerialize {

    private $_id;

    public function __construct1($arrayValues, $withInfo = TRUE) {
        $this->_id = $arrayValues[ '_id' ];
        // $this-> = $arrayValues[ '' ];
    }

    public function getId() {
        return $this->_id;
    }
}