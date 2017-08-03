<?php

/**
 * Description of PowerUp
 *
 * @author Oliva
 */
class PowerUp extends _EntitySerialize {

    private $_id;
    private $code;
    private $value;
    private $type;
    private $usages;
    private $reload_time;
    private $min_level;
    private $trans;

    public function __construct1($arrayValues) {
        $this->_id = $arrayValues['_id'];
        $this->code = $arrayValues['code'];
        $this->value = $arrayValues['value'];
        $this->type = $arrayValues['type'];
        $this->usages = $arrayValues['usages'];
        $this->reload_time = $arrayValues['reload_time'];
        $this->min_level = $arrayValues['min_level'];
        foreach ($arrayValues['trans'] as $loc) {
            $this->addTrans(new GenericTrans($loc));
        }
    }

    public function get_id() {
        return $this->_id;
    }

    public function getCode() {
        return $this->code;
    }

    public function getValue() {
        return $this->value;
    }

    public function getType() {
        return $this->type;
    }

    public function getUsages() {
        return $this->usages;
    }

    public function getReloadTime() {
        return $this->reload_time;
    }

    public function getMinLevel() {
        return $this->min_level;
    }

    public function getTrans() {
        return $this->trans;
    }

    public function setCode($code) {
        $this->code = $code;
    }

    public function setValue($value) {
        $this->value = $value;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setUsages($usages) {
        $this->usages = $usages;
    }

    public function setReloadTime($reload_time) {
        $this->reload_time = $reload_time;
    }

    public function setMinLevel($min_level) {
        $this->min_level = $min_level;
    }

    public function setTrans($trans) {
        $this->trans = $trans;
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
    public function serialize($propsUnserialized = null) {
        $properties = get_object_vars($this);
        if (!is_null($propsUnserialized)) {
            foreach ($propsUnserialized as $property) {
                unset($properties[$property]);
            }
        }
        parent::setObject($properties);
        return parent::serialize();
    }

}
