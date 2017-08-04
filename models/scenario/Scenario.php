<?php

/**
 * Created by PhpStorm.
 * User: Oliva
 * Date: 04/08/2017
 * Time: 19:48
 */
class Scenario extends _EntitySerialize {

    private $_id;
    private $id_scenario;
    private $code;
    private $flag_active;
    private $add_date;
    private $min_level;
    private $trans;
    private $rewards;           // IDs de las rewards
    private $id_resource;       // ID del resource
    private $allowed_powerups;  // IDs de los powerups permitidos

    public function __construct1($arrayValues, $withInfo = TRUE) {
        $this->_id = $arrayValues[ '_id' ];
        $this->id_scenario = $arrayValues[ 'id_scenario' ];
        $this->code = $arrayValues[ 'code' ];
        $this->flag_active = $arrayValues[ 'flag_active' ];
        $this->add_date = $arrayValues[ 'add_date' ];
        $this->min_level = $arrayValues[ 'min_level' ];
        $this->id_resource = $arrayValues[ 'id_resource' ];
        $this->rewards = $arrayValues[ 'rewards' ];
        $this->allowed_powerups = $arrayValues[ 'allowed_powerups' ];
        foreach ($arrayValues[ 'trans' ] as $loc) {
            $this->addTrans(new GenericTrans($loc));
        }
    }

    public function addTrans($trans) {
        if (is_null($this->trans)) {
            $this->trans = array();
        }
        array_push($this->trans, $trans);
    }

    public function getId() {
        return $this->_id;
    }
}