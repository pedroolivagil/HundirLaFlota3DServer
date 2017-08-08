<?php

/**
 * Created by PhpStorm.
 * User: Oliva
 * Date: 08/08/2017
 * Time: 22:53
 */
class Battle extends _EntitySerialize {

    private $_id;

    public function __construct1($arrayValues, $withInfo = TRUE) {
        $this->_id = $arrayValues[ '_id' ];
        // $this-> = $arrayValues[ '' ];
        foreach ($arrayValues[ 'trans' ] as $loc) {
            $this->addTrans(new GenericTrans($loc));
        }
    }

    public function getId() {
        return $this->_id;
    }

    public function addTrans($trans) {
        if (is_null($this->trans)) {
            $this->trans = array();
        }
        array_push($this->trans, $trans);
    }
}