<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PersistenseManager
 *
 * @author Oliva
 */
class _PersistenceManager {

    protected $db;
    protected $collectionName;

    public function __construct($collectionName) {
        $this->db = DB::getInstance();
        $this->collectionName = $collectionName;
    }

    public function count() {
        return $this->db->count($this->collectionName);
    }

    protected function find() {
        return $this->db->find($this->collectionName);
    }

    protected function findByKey($key) {
        $keys = array_keys($key);
        $values = array_values($key);
        $clave = array(
            $keys[0] => new \MongoDB\BSON\Regex(preg_quote($values[0]), 'i')
        );
        return $this->db->findByKey($this->collectionName, $clave);
    }

    protected function findOneByKey($key) {
        $keys = array_keys($key);
        $values = array_values($key);
        $clave = array(
            $keys[0] => new \MongoDB\BSON\Regex(preg_quote($values[0]), 'i')
        );
        return $this->db->findOneByKey($this->collectionName, $clave);
    }

    protected function merge($key, $data) {
        if (!is_null($data)) {
            $data = json_decode($data, true);
            return $this->db->merge($this->collectionName, $key, $data);
        }
        return FALSE;
    }

    protected function persist($data) {
        if (!is_null($data)) {
            $data = json_decode($data, true);
            return $this->db->persist($this->collectionName, $data);
        }
        return FALSE;
    }

    protected function remove($key, $data) {
        if (!is_null($data)) {
            $data = json_decode($data, true);
            $data[COL_FLAG_ACTIVO] = FALSE;
            return $this->db->remove($this->collectionName, $key, $data);
        }
        return FALSE;
    }

    public function close() {
        $db->close();
    }

}
