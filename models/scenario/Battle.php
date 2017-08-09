<?php

/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: Battle.php
 * Date: 09/08/2017 02:48
 */
class Battle extends _EntitySerialize {

    private $_id;
    private $id_battle;
    private $trans;
    private $code;
    private $add_date;
    private $flag_active;
    private $min_level;             // UserLevel mínimo para jugar esta batalla
    private $rewards;               // IDs de las rewards.
    private $allowed_powerups;      // IDs de los powerups permitidos.
    private $allowed_user_ships;    // IDs de los buques del usurio permitidos.
    private $allowed_cpu_ships;     // IDs de los buques enemigos permitidos.
    private $min_time;              // Tiempo mínimo que ha de aguantar el usuario para ganar y no perder.
    private $win_before_min_time;   // Permite o no, ganar antes de tiempo.
    private $max_time;              // Tiempo límite para ganar.
    private $profile_cpu;           // ID del perfil del enemigo.
    private $cpu_fog;               // boolean para des/habilitar la niebla del enemigo
    private $panel_size;            // Tamaño del tablero. 8x8, 10x10,...

    public function __construct1($arrayValues, $withInfo = TRUE) {
        $this->_id = $arrayValues[ '_id' ];
        $this->id_battle = $arrayValues[ 'id_battle' ];
        $this->code = $arrayValues[ 'code' ];
        $this->add_date = $arrayValues[ 'add_date' ];
        $this->flag_active = $arrayValues[ 'flag_active' ];
        $this->min_level = $arrayValues[ 'min_level' ];
        $this->rewards = $arrayValues[ 'rewards' ];
        $this->allowed_powerups = $arrayValues[ 'allowed_powerups' ];
        $this->allowed_user_ships = $arrayValues[ 'allowed_user_ships' ];
        $this->allowed_cpu_ships = $arrayValues[ 'allowed_cpu_ships' ];
        $this->min_time = $arrayValues[ 'min_time' ];
        $this->win_before_min_time = $arrayValues[ 'win_before_min_time' ];
        $this->max_time = $arrayValues[ 'max_time' ];
        $this->profile_cpu = $arrayValues[ 'profile_cpu' ];
        $this->cpu_fog = $arrayValues[ 'cpu_fog' ];
        $this->panel_size = $arrayValues[ 'panel_size' ];
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
    public function getIdBattle() {
        return $this->id_battle;
    }

    /**
     * @param mixed $id_battle
     */
    public function setIdBattle($id_battle) {
        $this->id_battle = $id_battle;
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
    public function getAllowedUserShips() {
        return $this->allowed_user_ships;
    }

    /**
     * @param mixed $allowed_user_ships
     */
    public function setAllowedUserShips($allowed_user_ships) {
        $this->allowed_user_ships = $allowed_user_ships;
    }

    /**
     * @return mixed
     */
    public function getAllowedCpuShips() {
        return $this->allowed_cpu_ships;
    }

    /**
     * @param mixed $allowed_cpu_ships
     */
    public function setAllowedCpuShips($allowed_cpu_ships) {
        $this->allowed_cpu_ships = $allowed_cpu_ships;
    }

    /**
     * @return mixed
     */
    public function getMinTime() {
        return $this->min_time;
    }

    /**
     * @param mixed $min_time
     */
    public function setMinTime($min_time) {
        $this->min_time = $min_time;
    }

    /**
     * @return mixed
     */
    public function getWinBeforeMinTime() {
        return $this->win_before_min_time;
    }

    /**
     * @param mixed $win_before_min_time
     */
    public function setWinBeforeMinTime($win_before_min_time) {
        $this->win_before_min_time = $win_before_min_time;
    }

    /**
     * @return mixed
     */
    public function getMaxTime() {
        return $this->max_time;
    }

    /**
     * @param mixed $max_time
     */
    public function setMaxTime($max_time) {
        $this->max_time = $max_time;
    }

    /**
     * @return mixed
     */
    public function getProfileCpu() {
        return $this->profile_cpu;
    }

    /**
     * @param mixed $profile_cpu
     */
    public function setProfileCpu($profile_cpu) {
        $this->profile_cpu = $profile_cpu;
    }

    /**
     * @return mixed
     */
    public function getCpuFog() {
        return $this->cpu_fog;
    }

    /**
     * @param mixed $cpu_fog
     */
    public function setCpuFog($cpu_fog) {
        $this->cpu_fog = $cpu_fog;
    }

    /**
     * @return mixed
     */
    public function getPanelSize() {
        return $this->panel_size;
    }

    /**
     * @param mixed $panel_size
     */
    public function setPanelSize($panel_size) {
        $this->panel_size = $panel_size;
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