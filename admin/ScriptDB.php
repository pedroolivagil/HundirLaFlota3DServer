<?php

/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: ScriptDB.php
 * Date: 09/08/2017 02:48
 */
class ScriptDB {

    public $db;
    public $listCollections;

    public function __construct() {
        $this->db = DB::getInstance();
        $this->listCollections = array(
            TABLE_USER, TABLE_USER_GAME, TABLE_POWERUP, TABLE_RESOURCE, TABLE_SCENARIO, TABLE_BATTLE, TABLE_MARKET, TABLE_BANK,
            TABLE_VESSEL, TABLE_WEAPON, TABLE_APP_TEXT, TABLE_APP_LOCALE, TABLE_PROFILE_AI, TABLE_CITY, TABLE_CITY,
            TABLE_ITEM, TABLE_INVENTORY
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

    public function createCollection($collection) {
        $this->db->persistCollection($collection);
    }

    public function removeCollection($collection) {
        $this->db->persistCollection($collection);
    }
}
