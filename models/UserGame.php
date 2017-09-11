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
    private $id_user;
    private $id_scenario;

    public function __construct1($arrayValues, $withInfo = TRUE) {
        $this->_id = $arrayValues[ '_id' ];
        $this->flag_active = (bool)$arrayValues[ 'flag_active' ];
        $this->add_date = $arrayValues[ 'add_date' ];
        $this->id_user_game = (int)$arrayValues[ 'id_user_game' ];
        $this->id_user = (int)$arrayValues[ 'id_user' ];
        $this->id_scenario = (int)$arrayValues[ 'id_scenario' ];
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
    public function getIdUser() {
        return $this->id_user;
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($id_user) {
        $this->id_user = $id_user;
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
}
