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
include_once('../config.php');

class ScriptDB {

    public $db;
    public $listCollections;

    public function __construct() {
        $this->db = DB::getInstance();
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
            $this->db->persistCollection($collection);
        }
    }

    public function initCleanDB() {
        foreach ($this->listCollections as $collection) {
            $this->db->removeCollection($collection);
        }
    }

    public function loadDefaultData() {
        $userManager = new UserController();

        $users = array(
            new User(array(
                'username' => 'admin',
                'pass' => '1234',
                'email' => 'admin@hundirflota.es'
                    )),
            new User(array(
                'username' => 'db2admin',
                'pass' => '',
                'email' => ''
                    )),
            new User(array(
                'username' => 'root',
                'pass' => '',
                'email' => ''
                    )),
            new User(array(
                'username' => 'sql',
                'pass' => '',
                'email' => ''
                    )),
            new User(array(
                'username' => 'olivadevelop',
                'pass' => '',
                'email' => ''
                    )),
            new User(array(
                'username' => 'bot',
                'pass' => '',
                'email' => ''
                    )),
            new User(array(
                'username' => 'OliLogicStudios',
                'pass' => '',
                'email' => ''
                    )),
            new User(array(
                'username' => 'pedrooliva',
                'pass' => '',
                'email' => ''
                    )),
            new User(array(
                'username' => 'test',
                'pass' => '',
                'email' => ''
                    )),
            new User(array(
                'username' => 'prueba',
                'pass' => '',
                'email' => ''
                    )),
            new User(array(
                'username' => 'user',
                'pass' => '',
                'email' => ''
                    )),
            new User(array(
                'username' => 'user1',
                'pass' => '',
                'email' => ''
                    )),
            new User(array(
                'username' => 'demo',
                'pass' => '',
                'email' => ''
                    )),
            new User(array(
                'username' => 'username',
                'pass' => '',
                'email' => ''
                    )),
            new User(array(
                'username' => 'administrador',
                'pass' => '',
                'email' => ''
                    )),
            new User(array(
                'username' => 'administrator',
                'pass' => '',
                'email' => ''
                    ))
        );
        foreach ($users as $usuario) {
            $userManager->create($usuario);
        }
    }

}
