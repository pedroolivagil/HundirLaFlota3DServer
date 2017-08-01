<?php

/**
 * Description of Ship
 *
 * @author Oliva
 */
class Ship extends _EntitySerialize {

    private $_id;
    private $id_ship;
    private $flag_activo;
    private $code;
    private $health;
    private $size;
    private $fecha_alta;
    private $trans;

    public function __construct1($arrayValues) {
        $this->_id = $arrayValues['_id'];
        $this->id_ship = $arrayValues['id_ship'];
        $this->flag_activo = $arrayValues['flag_activo'];
        $this->code = $arrayValues['code'];
        $this->health = $arrayValues['health'];
        $this->size = $arrayValues['size'];
        $this->fecha_alta = $arrayValues['fecha_alta'];
        $this->trans = $arrayValues['trans'];
    }

    public function getId() {
        return $this->_id;
    }

    public function getIdShip() {
        return $this->id_ship;
    }

    public function getFlagActivo() {
        return $this->flag_activo;
    }

    public function getCode() {
        return $this->code;
    }

    public function getHealth() {
        return $this->health;
    }

    public function getSize() {
        return $this->size;
    }

    public function getFechaAlta() {
        return $this->fecha_alta;
    }

    public function getTrans() {
        return $this->trans;
    }

    public function setTrans($id_trans) {
        $this->id_trans = $trans;
    }

    public function setId($_id) {
        $this->_id = $_id;
    }

    public function setIdShip($id_ship) {
        $this->id_ship = $id_ship;
    }

    public function setFlagActivo($flag_activo) {
        $this->flag_activo = $flag_activo;
    }

    public function setCode($code) {
        $this->code = $code;
    }

    public function setHealth($health) {
        $this->health = $health;
    }

    public function setSize($size) {
        $this->size = $size;
    }

    public function setFechaAlta($fecha_alta) {
        $this->fecha_alta = $fecha_alta;
    }

    /**
     * 
     * @param type $propsUnserialized Array de nombre de propiedades a excluir
     * @return type
     */
    public function serialize($propsUnserialized = null) {
        $properties = get_object_vars($this);
        if (Tools::isNotNull($propsUnserialized)) {
            foreach ($propsUnserialized as $property) {
                unset($properties[$property]);
            }
        }
        parent::setObject($properties);
        return parent::serialize();
    }

}
