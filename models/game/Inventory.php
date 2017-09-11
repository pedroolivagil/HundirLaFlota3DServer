<?php
/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: Inventory.php
 * Date: 11/09/2017 20:08
 */

class Inventory extends _EntitySerialize {

    private $_id;
    private $id_inventory;
    private $code;
    private $flag_active;
    private $add_date;
    private $items;             // IDs de los item del usuario
    private $max_items;         // máximo de items en el invetario

    public function __construct1($arrayValues) {
        $this->_id = $arrayValues[ '_id' ];
        $this->code = $arrayValues[ 'code' ];
        $this->flag_active = (bool)$arrayValues[ 'flag_active' ];
        $this->add_date = $arrayValues[ 'add_date' ];
        $this->id_inventory = (int)$arrayValues[ 'id_inventory' ];
        $this->items = $arrayValues[ 'items' ];
        $this->max_items = $arrayValues[ 'max_items' ];
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
    public function getIdInventory() {
        return $this->id_inventory;
    }

    /**
     * @param mixed $id_inventory
     */
    public function setIdInventory($id_inventory) {
        $this->id_inventory = $id_inventory;
    }

    /**
     * @return mixed
     */
    public function getItems() {
        return $this->items;
    }

    /**
     * @param mixed $items
     */
    public function setItems($items) {
        $this->items = $items;
    }

    /**
     * @return mixed
     */
    public function getMaxItems() {
        return $this->max_items;
    }

    /**
     * @param mixed $max_items
     */
    public function setMaxItems($max_items) {
        $this->max_items = $max_items;
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
