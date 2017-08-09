<?php

/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: UserLog.php
 * Date: 09/08/2017 02:48
 */
class UserLog extends _EntitySerialize {

    private $_id;
    private $log_date;      // fecha del log
    private $author;        // ID del usuario que realiza la acción
    private $author_ip;     // la IP del usuario que realiza la acción
    private $author_range;  // el rango del usuario que realiza la acción
    private $author_cause;  // causa por la que se efectua el cambio
    private $to_user;       // el usuario afectado
    private $to_table;      // la tabla afectada
    private $action;        // la acción realizada
    private $new_value;     // el nuevo valor, si lo hay
    private $old_value;     // el viejo valor, si ha sido cambiado
    private $state;         // estado del log, pendiente, concluido o fallido

    public function __construct1($arrayValues) {
        $this->_id = $arrayValues[ '_id' ];
        $this->log_date = $arrayValues[ 'log_date' ];
        $this->author = $arrayValues[ 'author' ];
        $this->author_ip = $arrayValues[ 'author_ip' ];
        $this->author_range = $arrayValues[ 'author_range' ];
        $this->author_cause = $arrayValues[ 'author_cause' ];
        $this->to_user = $arrayValues[ 'to_user' ];
        $this->to_table = $arrayValues[ 'to_table' ];
        $this->action = $arrayValues[ 'action' ];
        $this->new_value = $arrayValues[ 'new_value' ];
        $this->old_value = $arrayValues[ 'old_value' ];
        $this->state = $arrayValues[ 'state' ];
    }

    public function getId() {
        return $this->_id;
    }

    public function getLogDate() {
        return $this->log_date;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getAuthorIp() {
        return $this->author_ip;
    }

    public function getAuthorRange() {
        return $this->author_range;
    }

    public function getAuthorCause() {
        return $this->author_cause;
    }

    public function getToUser() {
        return $this->to_user;
    }

    public function getToTable() {
        return $this->to_table;
    }

    public function getAction() {
        return $this->action;
    }

    public function getNewValue() {
        return $this->new_value;
    }

    public function getOldValue() {
        return $this->old_value;
    }

    public function setLogDate($log_date) {
        $this->log_date = $log_date;
    }

    public function getState() {
        return $this->state;
    }

    public function setState($state) {
        $this->state = $state;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function setAuthorIp($author_ip) {
        $this->author_ip = $author_ip;
    }

    public function setAuthorRange($author_range) {
        $this->author_range = $author_range;
    }

    public function setAuthorCause($author_cause) {
        $this->author_cause = $author_cause;
    }

    public function setToUser($to_user) {
        $this->to_user = $to_user;
    }

    public function setToTable($to_table) {
        $this->to_table = $to_table;
    }

    public function setAction($action) {
        $this->action = $action;
    }

    public function setNewValue($new_value) {
        $this->new_value = $new_value;
    }

    public function setOldValue($old_value) {
        $this->old_value = $old_value;
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
