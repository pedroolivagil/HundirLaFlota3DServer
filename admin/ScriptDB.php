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
        $this->db = DB::getInstance();
        $this->listCollections = array(
            TABLE_USER, TABLE_POWERUP, TABLE_POWERUP_TYPE,
            TABLE_SCENARIO, TABLE_BATTLE, TABLE_BATTLE_REWARD, TABLE_BATTLE_TYPE,
            TABLE_VESSEL, TABLE_WEAPON, TABLE_WEAPON_TYPE, TABLE_USER_GAME_LIST,
            TABLE_USER_POWERUP, TABLE_SCENARIO_BATTLE, TABLE_APP_TEXT, TABLE_APP_LOCALE
        );
    }

    public function initCreateDB() {
        foreach ($this->listCollections as $collection) {
            $this->db->persistCollection($collection);
        }
    }

    public function initCleanDB() {
        foreach ($this->listCollections as $collection) {
            $this->db->removeCollection($collection);
        }
    }

}
