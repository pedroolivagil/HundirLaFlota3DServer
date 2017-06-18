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

    protected function find() {
        return $this->db->find($this->collectionName);
    }

    protected function findByKey($key) {
        return $this->db->findByKey($this->collectionName, $key);
    }

    protected function merge(&$key = NULL, $newData = NULL) {
        
    }

    protected function persist(&$data = NULL) {
        
    }

    protected function remove(&$key = NULL) {
        
    }

    public function close() {
        $db->close();
    }

}