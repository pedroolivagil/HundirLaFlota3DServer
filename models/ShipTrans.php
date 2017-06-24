<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ShipTrans
 *
 * @author Oliva
 */
class ShipTrans extends _EntitySerialize {

    private $_id;
    private $texto;
    private $id_idioma;
    private $flag_activo;
    private $fecha_alta;

    public function __construct1($arrayValues) {
        $this->_id = $arrayValues['_id'];
        $this->flag_activo = $arrayValues['flag_activo'];
        $this->fecha_alta = $arrayValues['fecha_alta'];
        $this->texto = $arrayValues['texto'];
        $this->id_idioma = $arrayValues['id_idioma'];
    }

    public function getId() {
        return $this->_id;
    }

    public function getTexto() {
        return $this->texto;
    }

    public function getIdIdioma() {
        return $this->id_idioma;
    }

    public function getFlagActivo() {
        return $this->flag_activo;
    }

    public function getFechaAlta() {
        return $this->fecha_alta;
    }

    public function setId($id) {
        $this->_id = $id;
    }

    public function setTexto($texto) {
        $this->texto = $texto;
    }

    public function setIdIdioma($id_idioma) {
        $this->id_idioma = $id_idioma;
    }

    public function setFlagActivo($flag_activo) {
        $this->flag_activo = $flag_activo;
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
