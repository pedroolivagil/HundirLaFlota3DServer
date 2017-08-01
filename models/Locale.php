<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Idioma
 *
 * @author Oliva
 */
class LocaleController extends _EntitySerialize {

    private $_id;
    private $id_idioma;
    private $codigo_iso;
    private $flag_activo;
    private $fecha_alta;
    private $trans;

    public function __construct1($arrayValues) {
        $this->_id = $arrayValues['_id'];
        $this->flag_activo = $arrayValues['flag_activo'];
        $this->fecha_alta = $arrayValues['fecha_alta'];
        $this->codigo_iso = $arrayValues['codigo_iso'];
        $this->id_idioma = $arrayValues['id_idioma'];
        $this->trans = $arrayValues['trans'];
    }

    public function getId() {
        return $this->_id;
    }

    public function getIdIdioma() {
        return $this->id_idioma;
    }

    public function getCodigoISO() {
        return $this->codigo_iso;
    }

    public function getFlagActivo() {
        return $this->flag_activo;
    }

    public function getFechaAlta() {
        return $this->fecha_alta;
    }

    public function getTrans() {
        return $this->trans;
    }

    public function setTrans($trans) {
        $this->trans = $trans;
    }

    public function setId($id) {
        $this->_id = $id;
    }

    public function setIdIdioma($id_idioma) {
        $this->id_idioma = $id_idioma;
    }

    public function setCodigoISO($codigo_iso) {
        $this->codigo_iso = $codigo_iso;
    }

    public function setFlagActivo($flag_activo) {
        $this->flag_activo = $flag_activo;
    }

    public function setFechaAlta($fecha_alta) {
        $this->fecha_alta = $fecha_alta;
    }

    public function addTrans($trans) {
        if (is_null($this->trans)) {
            $this->trans = array();
        }
        array_push($this->trans, $trans);
    }

    public function removeTrans($trans) {
        unset($this->trans[$trans]);
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
