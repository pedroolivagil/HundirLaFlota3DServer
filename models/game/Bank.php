<?php
/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: Bank.php
 * Date: 10/09/2017 23:14
 */

class Bank extends _EntitySerialize {

    private $_id;
    private $id_bank;
    private $code;
    private $flag_active;
    private $add_date;
    private $max_time_money_reward;     // Tiempo de límite recarga de la recompensa
    private $time_money_reward;     // Tiempo de recarga de la recompensa
    private $safe_box;              // Caja fuerte
    private $item_box;              // Items guardados

    public function __construct1($arrayValues) {
        $this->_id = $arrayValues[ '_id' ];
        $this->id_bank = (int)$arrayValues[ 'id_bank' ];
        $this->code = $arrayValues[ 'code' ];
        $this->flag_active = (bool)$arrayValues[ 'flag_active' ];
        $this->add_date = $arrayValues[ 'add_date' ];
        $this->max_time_money_reward = (int)$arrayValues[ 'max_time_money_reward' ];
        $this->time_money_reward = (int)$arrayValues[ 'time_money_reward' ];
        $this->safe_box = (double)$arrayValues[ 'safe_box' ];
        $this->item_box = $arrayValues[ 'item_box' ];
    }

    public function getId() {
        return $this->_id;
    }

    /**
     * @return mixed
     */
    public function getIdBank() {
        return $this->id_bank;
    }

    /**
     * @param mixed $id_bank
     */
    public function setIdBank($id_bank) {
        $this->id_bank = $id_bank;
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
    public function getTimeMoneyReward() {
        return $this->time_money_reward;
    }

    /**
     * @param mixed $time_money_reward
     */
    public function setTimeMoneyReward($time_money_reward) {
        $this->time_money_reward = $time_money_reward;
    }

    /**
     * @return mixed
     */
    public function getMaxTimeMoneyReward() {
        return $this->max_time_money_reward;
    }

    /**
     * @param mixed $max_time_money_reward
     */
    public function setMaxTimeMoneyReward($max_time_money_reward) {
        $this->max_time_money_reward = $max_time_money_reward;
    }

    /**
     * @return mixed
     */
    public function getSafeBox() {
        return $this->safe_box;
    }

    /**
     * @param mixed $safe_box
     */
    public function setSafeBox($safe_box) {
        $this->safe_box = $safe_box;
    }

    /**
     * @return mixed
     */
    public function getItemBox() {
        return $this->item_box;
    }

    /**
     * @param mixed $item_box
     */
    public function setItemBox($item_box) {
        $this->item_box = $item_box;
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
