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
    private $id_resource;       // ID del resource
    private $rewards;           // IDs de las rewards
    private $allowed_powerups;  // IDs de los powerups permitidos
    private $battles;           // IDs de las batallas de cada mapa

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
        $this->battles = $arrayValues[ 'battles' ];
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
    public function getIdResource() {
        return $this->id_resource;
    }

    /**
     * @param mixed $id_resource
     */
    public function setIdResource($id_resource) {
        $this->id_resource = $id_resource;
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
    public function getAllowedPowerups() {
        return $this->allowed_powerups;
    }

    /**
     * @param mixed $allowed_powerups
     */
    public function setAllowedPowerups($allowed_powerups) {
        $this->allowed_powerups = $allowed_powerups;
    }

    /**
     * @return mixed
     */
    public function getBattles() {
        return $this->battles;
    }

    /**
     * @param mixed $battles
     */
    public function setBattles($battles) {
        $this->battles = $battles;
    }

    public function addTrans($trans) {
        if (is_null($this->trans)) {
            $this->trans = array();
        }
        array_push($this->trans, $trans);
    }
}