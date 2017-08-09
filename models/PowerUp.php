<?php

/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: PowerUp.php
 * Date: 09/08/2017 02:48
 */
class PowerUp extends _EntitySerialize {

    private $_id;
    private $id_powerup;
    private $flag_active;
    private $add_date;
    private $code;
    private $value;
    private $type;
    private $usages;
    private $reload_time;
    private $min_level;
    private $trans;

    public function __construct1($arrayValues) {
        $this->_id = $arrayValues[ '_id' ];
        $this->id_powerup = $arrayValues[ 'id_powerup' ];
        $this->code = $arrayValues[ 'code' ];
        $this->value = $arrayValues[ 'value' ];
        $this->type = $arrayValues[ 'type' ];
        $this->usages = $arrayValues[ 'usages' ];
        $this->reload_time = $arrayValues[ 'reload_time' ];
        $this->min_level = $arrayValues[ 'min_level' ];
        foreach ($arrayValues[ 'trans' ] as $loc) {
            $this->addTrans(new GenericTrans($loc));
        }
    }

    public function getId() {
        return $this->_id;
    }

    public function getIdPowerup() {
        return $this->id_powerup;
    }

    public function getCode() {
        return $this->code;
    }

    public function getValue() {
        return $this->value;
    }

    public function getType() {
        return $this->type;
    }

    public function getUsages() {
        return $this->usages;
    }

    public function getReloadTime() {
        return $this->reload_time;
    }

    public function getMinLevel() {
        return $this->min_level;
    }

    public function getTrans() {
        return $this->trans;
    }

    public function getFlagActive() {
        return $this->flag_active;
    }

    public function getAddDate() {
        return $this->add_date;
    }

    public function setFlagActive($flag_active) {
        $this->flag_active = $flag_active;
    }

    public function setAddDate($add_date) {
        $this->add_date = $add_date;
    }

    public function setIdPowerup($id_powerup) {
        $this->id_powerup = $id_powerup;
    }

    public function setCode($code) {
        $this->code = $code;
    }

    public function setValue($value) {
        $this->value = $value;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setUsages($usages) {
        $this->usages = $usages;
    }

    public function setReloadTime($reload_time) {
        $this->reload_time = $reload_time;
    }

    public function setMinLevel($min_level) {
        $this->min_level = $min_level;
    }

    public function setTrans($trans) {
        $this->trans = $trans;
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
