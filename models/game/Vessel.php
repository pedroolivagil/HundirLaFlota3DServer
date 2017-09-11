<?php

/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: Vessel.phpp
 * Date: 13/08/2017 21:32
 */
class Vessel extends _EntitySerialize {

    private $_id;
    private $id_vessel;
    private $flag_active;
    private $add_date;
    private $code;
    private $trans;
    private $health;
    private $weapon;            //ID arma extra que usa

    public function __construct1($arrayValues) {
        $this->_id = $arrayValues[ '_id' ];
        $this->id_vessel = (int)$arrayValues[ 'id_vessel' ];
        $this->flag_active = (bool)$arrayValues[ 'flag_active' ];
        $this->add_date = $arrayValues[ 'add_date' ];
        $this->code = $arrayValues[ 'code' ];
        $this->health = (int)$arrayValues[ 'health' ];
        $this->weapon = (int)$arrayValues[ 'weapon' ];
        foreach ($arrayValues[ 'trans' ] as $loc) {
            $this->addTrans(new GenericTrans($loc));
        }
    }

    public function getId() {
        return $this->_id;
    }

    /**
     * @return mixed
     */
    public function getIdVessel() {
        return $this->id_vessel;
    }

    /**
     * @param mixed $id_vessel
     */
    public function setIdVessel($id_vessel) {
        $this->id_vessel = $id_vessel;
    }

    /**
     * @return mixed
     */
    public function getCode() {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code) {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getTrans() {
        return $this->trans;
    }

    /**
     * @param mixed $trans
     */
    public function setTrans($trans) {
        $this->trans = $trans;
    }

    /**
     * @return mixed
     */
    public function getHealth() {
        return $this->health;
    }

    /**
     * @param mixed $health
     */
    public function setHealth($health) {
        $this->health = $health;
    }

    /**
     * @return mixed
     */
    public function getWeapon() {
        return $this->weapon;
    }

    /**
     * @param mixed $weapon
     */
    public function setWeapon($weapon) {
        $this->weapon = $weapon;
    }

    /**
     * @return mixed
     */
    public function getFlagActive() {
        return $this->flag_active;
    }

    /**
     * @param mixed $flag_active
     */
    public function setFlagActive($flag_active) {
        $this->flag_active = $flag_active;
    }

    /**
     * @return mixed
     */
    public function getAddDate() {
        return $this->add_date;
    }

    /**
     * @param mixed $add_date
     */
    public function setAddDate($add_date) {
        $this->add_date = $add_date;
    }

    public function addTrans($trans) {
        if (is_null($this->trans)) {
            $this->trans = array();
        }
        array_push($this->trans, $trans);
    }

    /**
     *
     * @param type $propsUnserialized Array de nombre de propiedades a excluir
     * @return type
     */
    public function serialize($propsUnserialized = NULL) {
        $properties = get_object_vars($this);
        if (!is_null($propsUnserialized)) {
            foreach ($propsUnserialized as $property) {
                unset($properties[ $property ]);
            }
        }
        parent::setObject($properties);
        return parent::serialize();
    }
}