<?php


/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: LocaleApp.php
 * Date: 09/08/2017 02:48
 */
class LocaleApp extends _EntitySerialize {

    private $_id;
    private $id_locale;
    private $code_iso;
    private $flag_active;
    private $add_date;
    private $trans;

    public function __construct1($arrayValues) {
        $this->_id = $arrayValues[ '_id' ];
        $this->flag_active = $arrayValues[ 'flag_active' ];
        $this->add_date = $arrayValues[ 'add_date' ];
        $this->code_iso = $arrayValues[ 'code_iso' ];
        $this->id_locale = $arrayValues[ 'id_locale' ];
        foreach ($arrayValues[ 'trans' ] as $loc) {
            $this->addTrans(new GenericTrans($loc));
        }
    }

    public function getId() {
        return $this->_id;
    }

    public function getIdLocale() {
        return $this->id_locale;
    }

    public function getCodeISO() {
        return $this->code_iso;
    }

    public function getFlagActive() {
        return $this->flag_active;
    }

    public function getAddDate() {
        return $this->add_date;
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

    public function setIdLocale($id_locale) {
        $this->id_locale = $id_locale;
    }

    public function setCodeISO($code_iso) {
        $this->code_iso = $code_iso;
    }

    public function setFlagActive($flag_active) {
        $this->flag_active = $flag_active;
    }

    public function setAddDate($add_date) {
        $this->add_date = $add_date;
    }

    public function addTrans($trans) {
        if (is_null($this->trans)) {
            $this->trans = array();
        }
        array_push($this->trans, $trans);
    }

    public function removeTrans($trans) {
        unset($this->trans[ $trans ]);
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
