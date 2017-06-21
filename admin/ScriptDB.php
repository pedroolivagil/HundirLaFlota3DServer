<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ScriptDB
 *
 * @author Oliva
 */
class ScriptDB {

    public $db;
    public $listCollections;

    public function __construct() {
        $this->db = new DBManager();
        $this->listCollections = array(
            TABLE_AMUNITION,
            TABLE_CITY,
            TABLE_GAME,
            TABLE_GAME_PLAYER_STATUS,
            TABLE_GAME_USER,
            TABLE_LEVEL,
            TABLE_LOG_USER,
            TABLE_PLAYER_STATUS,
            TABLE_SETTINGS,
            TABLE_SHIP,
            TABLE_USER
        );
    }

    public function initCreateDB() {
        foreach ($this->listCollections as $collection) {
            $this->db->createCollection($collection);
        }
    }

    public function initCleanDB() {
        foreach ($this->listCollections as $collection) {
            $this->db->dropCollection($collection);
        }
    }

}