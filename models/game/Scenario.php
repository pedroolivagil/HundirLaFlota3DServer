<?php

/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: Scenario.php
 * Date: 09/08/2017 02:48
 */
class Scenario extends _EntitySerialize {

    private $_id;
    private $id_scenario;
    private $code;
    private $flag_active;
    private $add_date;
    private $min_level;
    private $trans;
    private $resource;       // ID del resource
    private $rewards;           // IDs de las rewards
    private $cities;            // IDs de las batallas de cada mapa
    private $randomBattles;     // Array de coordenadas para las batallas random

    public function __construct1($arrayValues) {
        $this->_id = $arrayValues[ '_id' ];
        $this->id_scenario = (int)$arrayValues[ 'id_scenario' ];
        $this->code = $arrayValues[ 'code' ];
        $this->flag_active = (bool)$arrayValues[ 'flag_active' ];
        $this->add_date = $arrayValues[ 'add_date' ];
        $this->min_level = (int)$arrayValues[ 'min_level' ];
        $this->resource = (int)$arrayValues[ 'resource' ];
        $this->rewards = $arrayValues[ 'rewards' ];
        $this->cities = $arrayValues[ 'cities' ];
        $this->randomBattles = $arrayValues[ 'randomBattles' ];
        if ($arrayValues[ 'trans' ] != NULL) {
            foreach ($arrayValues[ 'trans' ] as $loc) {
                $this->addTrans(new GenericTrans($loc));
            }
        }
    }

    public function getId() {
        return $this->_id;
    }

    /**
     * @return mixed
     */
    public function getIdScenario() {
        return $this->id_scenario;
    }

    /**
     * @param mixed $id_scenario
     */
    public function setIdScenario($id_scenario) {
        $this->id_scenario = $id_scenario;
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

    /**
     * @return mixed
     */
    public function getMinLevel() {
        return $this->min_level;
    }

    /**
     * @param mixed $min_level
     */
    public function setMinLevel($min_level) {
        $this->min_level = $min_level;
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
    public function getResource() {
        return $this->resource;
    }

    /**
     * @param mixed $resource
     */
    public function setResource($resource) {
        $this->resource = $resource;
    }

    /**
     * @return mixed
     */
    public function getRewards() {
        return $this->rewards;
    }

    /**
     * @param mixed $rewards
     */
    public function setRewards($rewards) {
        $this->rewards = $rewards;
    }

    /**
     * @return mixed
     */
    public function getCities() {
        return $this->cities;
    }

    /**
     * @param mixed $cities
     */
    public function setCities($cities) {
        $this->cities = $cities;
    }

    public function addTrans($trans) {
        if (is_null($this->trans)) {
            $this->trans = array();
        }
        array_push($this->trans, $trans);
    }

    /**
     * @return mixed
     */
    public function getRandomBattles() {
        return $this->randomBattles;
    }

    /**
     * @param mixed $randomBattles
     */
    public function setRandomBattles($randomBattles) {
        $this->randomBattles = $randomBattles;
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