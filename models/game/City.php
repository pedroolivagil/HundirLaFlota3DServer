<?php
/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: City.php
 * Date: 10/09/2017 13:53
 */

class City extends _EntitySerialize {

    private $_id;
    private $id_city;
    private $trans;
    private $code;
    private $flag_active;
    private $add_date;
    private $battles;           // IDs de las batallas de cada mapa
    private $crew_side;         // Booleano para el bando de la ciudad (enemigo o aliado)
    private $quests;            // Objetivos para las ciudades, batallas, etc, ...
    private $id_market;         // Mercado asociado a la ciudad
    private $id_resource;       // ID resource asociado

    public function __construct1($arrayValues) {
        $this->_id = $arrayValues[ '_id' ];
        $this->id_city = (int)$arrayValues[ 'id_city' ];
        $this->code = $arrayValues[ 'code' ];
        $this->flag_active = (bool)$arrayValues[ 'flag_active' ];
        $this->add_date = $arrayValues[ 'add_date' ];
        $this->battles = $arrayValues[ 'battles' ];
        $this->crew_side = $arrayValues[ 'crew_side' ];
        $this->quests = $arrayValues[ 'quests' ];
        $this->id_market = (int)$arrayValues[ 'id_market' ];
        $this->id_resource = (int)$arrayValues[ 'id_resource' ];
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
    public function getIdCity() {
        return $this->id_city;
    }

    /**
     * @param mixed $id_city
     */
    public function setIdCity($id_city) {
        $this->id_city = $id_city;
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
    public function getBattles() {
        return $this->battles;
    }

    /**
     * @param mixed $battles
     */
    public function setBattles($battles) {
        $this->battles = $battles;
    }

    /**
     * @return mixed
     */
    public function getCrewSide() {
        return $this->crew_side;
    }

    /**
     * @param mixed $crew_side
     */
    public function setCrewSide($crew_side) {
        $this->crew_side = $crew_side;
    }

    /**
     * @return mixed
     */
    public function getQuests() {
        return $this->quests;
    }

    /**
     * @param mixed $quests
     */
    public function setQuests($quests) {
        $this->quests = $quests;
    }

    /**
     * @return mixed
     */
    public function getIdMarket() {
        return $this->id_market;
    }

    /**
     * @param mixed $id_market
     */
    public function setIdMarket($id_market) {
        $this->id_market = $id_market;
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

    public function addTrans($trans) {
        if (is_null($this->trans)) {
            $this->trans = array();
        }
        array_push($this->trans, $trans);
    }

    /**
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
