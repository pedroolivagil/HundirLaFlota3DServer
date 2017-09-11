<?php
/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: Market.php
 * Date: 10/09/2017 23:13
 */

class Market extends _EntitySerialize {

    private $_id;
    private $id_market;
    private $code;
    private $flag_active;
    private $add_date;
    private $items;             // IDs de Items asociados al market
    private $items_purchase;    // IDs de los items de compra (compra real)

    public function __construct1($arrayValues) {
        $this->_id = $arrayValues[ '_id' ];
        $this->id_market = (int)$arrayValues[ 'id_market' ];
        $this->code = $arrayValues[ 'code' ];
        $this->flag_active = (bool)$arrayValues[ 'flag_active' ];
        $this->add_date = $arrayValues[ 'add_date' ];
        $this->items = $arrayValues[ 'items' ];
        $this->items_purchase = $arrayValues[ 'items_purchase' ];
    }

    public function getId() {
        return $this->_id;
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
    public function getItemsPurchase() {
        return $this->items_purchase;
    }

    /**
     * @param mixed $items_purchase
     */
    public function setItemsPurchase($items_purchase) {
        $this->items_purchase = $items_purchase;
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
