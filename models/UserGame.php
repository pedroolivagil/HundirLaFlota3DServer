<?php
/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: UserGame.php
 * Date: 11/09/2017 21:58
 */

class UserGame extends _EntitySerialize {

    private $_id;
    private $flag_active;
    private $add_date;
    private $id_user_game;
    private $user;
    private $scenario;
    private $bank;
    private $play_time;

    public function __construct1($arrayValues) {
        $this->_id = $arrayValues[ '_id' ];
        $this->flag_active = (bool)$arrayValues[ 'flag_active' ];
        $this->add_date = $arrayValues[ 'add_date' ];
        $this->id_user_game = (int)$arrayValues[ 'id_user_game' ];
        $this->user = (int)$arrayValues[ 'id_user' ];
        $this->scenario = (int)$arrayValues[ 'id_scenario' ];
        $this->bank = (int)$arrayValues[ 'id_bank' ];
        $this->play_time = (int)$arrayValues[ 'play_time' ];
    }

    public function getId() {
        return $this->_id;
    }

    /**
     * @return mixed
     */
    public function getIdUserGame() {
        return $this->id_user_game;
    }

    /**
     * @param mixed $id_user_game
     */
    public function setIdUserGame($id_user_game) {
        $this->id_user_game = $id_user_game;
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
    public function getUser() {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user) {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getScenario() {
        return $this->scenario;
    }

    /**
     * @param mixed $scenario
     */
    public function setScenario($scenario) {
        $this->scenario = $scenario;
    }

    /**
     * @return mixed
     */
    public function getBank() {
        return $this->bank;
    }

    /**
     * @param mixed $bank
     */
    public function setBank($bank) {
        $this->bank = $bank;
    }

    /**
     * @return mixed
     */
    public function getPlayTime() {
        return $this->play_time;
    }

    /**
     * @param mixed $play_time
     */
    public function setPlayTime($play_time) {
        $this->play_time = $play_time;
    }

    /**
     * Array de nombre de propiedades a excluir
     * @param null $propsUnserialized
     * @return string
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

    public function serializeSequential() {
        $userSerialized = $this->getUser()->serialize();
        $bankSerialized = $this->getBank()->serialize();
        $scenarioSerialized = $this->getScenario()->serialize();
        $newObj = $this;
        $newObj->setBank($bankSerialized);
        $newObj->setUser($userSerialized);
        $newObj->setScenario($scenarioSerialized);
        return $newObj->serialize();
    }
}
