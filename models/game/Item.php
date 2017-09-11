<?php
/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: Item.php
 * Date: 11/09/2017 18:59
 */

class Item extends _EntitySerialize {

    private $_id;
    private $id_item;
    private $trans;
    private $code;
    private $flag_active;
    private $add_date;
    private $item_price;
    private $description;
    private $min_level;
    private $expiry_date;       // fecha de caducidad

    public function __construct1($arrayValues) {
        $this->_id = $arrayValues[ '_id' ];
        $this->id_item = (int)$arrayValues[ 'id_item' ];
        $this->code = $arrayValues[ 'code' ];
        $this->flag_active = (bool)$arrayValues[ 'flag_active' ];
        $this->add_date = $arrayValues[ 'add_date' ];
        $this->item_price = (double)$arrayValues[ 'item_price' ];
        $this->min_level = (int)$arrayValues[ 'min_level' ];
        $this->expiry_date = $arrayValues[ 'expiry_date' ];
        foreach ($arrayValues[ 'trans' ] as $loc) {
            $this->addTrans(new GenericTrans($loc));
        }
        foreach ($arrayValues[ 'description' ] as $descript) {
            $this->addDescript(new GenericTrans($descript));
        }
    }

    public function getId() {
        return $this->_id;
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

    public function addTrans($trans) {
        if (is_null($this->trans)) {
            $this->trans = array();
        }
        array_push($this->trans, $trans);
    }

    public function addDescript($descript) {
        if (is_null($this->description)) {
            $this->description = array();
        }
        array_push($this->description, $descript);
    }

    /**
     * @return mixed
     */
    public function getIdItem() {
        return $this->id_item;
    }

    /**
     * @param mixed $id_item
     */
    public function setIdItem($id_item) {
        $this->id_item = $id_item;
    }

    /**
     * @return mixed
     */
    public function getItemPrice() {
        return $this->item_price;
    }

    /**
     * @param mixed $item_price
     */
    public function setItemPrice($item_price) {
        $this->item_price = $item_price;
    }

    /**
     * @return mixed
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description) {
        $this->description = $description;
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
    public function getExpiryDate() {
        return $this->expiry_date;
    }

    /**
     * @param mixed $expiry_date
     */
    public function setExpiryDate($expiry_date) {
        $this->expiry_date = $expiry_date;
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
