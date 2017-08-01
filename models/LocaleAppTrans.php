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
class LocaleAppTrans extends _EntitySerialize {

    private $text;
    private $id_locale;

    public function __construct1($arrayValues) {
        if (!is_array($arrayValues)) {
            $arrayValues = json_decode($arrayValues, TRUE);
        }
        $this->text = $arrayValues['text'];
        $this->id_locale = $arrayValues['id_locale'];
    }

    public function getIdLocale() {
        return $this->id_locale;
    }

    public function setIdLocale($id_locale) {
        $this->id_locale = $id_locale;
    }

    public function getText() {
        return $this->text;
    }

    public function setText($text) {
        $this->text = $text;
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
