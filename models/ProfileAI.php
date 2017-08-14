<?php
/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: ProfileAI.php
 * Date: 14/08/2017 22:18
 */

class ProfileAI extends _EntitySerialize {

    private $_id;
    private $id_profile_ai;
    private $flag_active;
    private $add_date;
    private $code;
    // propiedades de la IA
    private $accuracy;          // Puntería
    private $lucky;             // Suerte
    private $courage;           // Coraje
    private $level;             // Nivel mínimo del usuario
    private $wit;               // Agudeza de acierto después del primero (de cada turno)

    public function __construct1($arrayValues) {
        $this->_id = $arrayValues[ '_id' ];
        $this->id_profile_ai = $arrayValues[ 'id_profile_ai' ];
        $this->flag_active = $arrayValues[ 'flag_active' ];
        $this->add_date = $arrayValues[ 'add_date' ];
        $this->code = $arrayValues[ 'code' ];
        $this->accuracy = $arrayValues[ 'accuracy' ];
        $this->lucky = $arrayValues[ 'lucky' ];
        $this->courage = $arrayValues[ 'courage' ];
        $this->level = $arrayValues[ 'level' ];
        $this->wit = $arrayValues[ 'wit' ];
    }

    public function getId() {
        return $this->_id;
    }

    /**
     * @return mixed
     */
    public function getIdProfileAi() {
        return $this->id_profile_ai;
    }

    /**
     * @param mixed $id_profile_ai
     */
    public function setIdProfileAi($id_profile_ai) {
        $this->id_profile_ai = $id_profile_ai;
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
    public function getAccuracy() {
        return $this->accuracy;
    }

    /**
     * @param mixed $accuracy
     */
    public function setAccuracy($accuracy) {
        $this->accuracy = $accuracy;
    }

    /**
     * @return mixed
     */
    public function getLucky() {
        return $this->lucky;
    }

    /**
     * @param mixed $lucky
     */
    public function setLucky($lucky) {
        $this->lucky = $lucky;
    }

    /**
     * @return mixed
     */
    public function getCourage() {
        return $this->courage;
    }

    /**
     * @param mixed $courage
     */
    public function setCourage($courage) {
        $this->courage = $courage;
    }

    /**
     * @return mixed
     */
    public function getLevel() {
        return $this->level;
    }

    /**
     * @param mixed $level
     */
    public function setLevel($level) {
        $this->level = $level;
    }

    /**
     * @return mixed
     */
    public function getWit() {
        return $this->wit;
    }

    /**
     * @param mixed $wit
     */
    public function setWit($wit) {
        $this->wit = $wit;
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
