<?php

/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: Battle.php
 * Date: 09/08/2017 02:48
 */
class Battle extends _EntitySerialize {

    private $_id;
    private $trans;
    private $code;
    private $add_date;
    private $flag_active;
    private $min_level;             // UserLevel mínimo para jugar esta batalla
    private $rewards;               // IDs de las rewards.
    private $allowed_powerups;      // IDs de los powerups permitidos.
    private $ships_user_allowed;    // IDs de los buques del usurio permitidos.
    private $ships_enemy_allowed;   // IDs de los buques enemigos permitidos.
    private $min_time;              // Tiempo mínimo que ha de aguantar el usuario para ganar y no perder.
    private $win_before_min_time;   // Permite o no, ganar antes de tiempo.
    private $max_time;              // Tiempo límite para ganar.
    private $profile_enemy;         // ID del perfil del enemigo.
    private $fog;                   // boolean para des/habilitar la niebla del enemigo
    private $panel_size;            // Tamaño del tablero. 8x8, 10x10,...

    public function __construct1($arrayValues, $withInfo = TRUE) {
        $this->_id = $arrayValues[ '_id' ];
        // $this-> = $arrayValues[ '' ];
        foreach ($arrayValues[ 'trans' ] as $loc) {
            $this->addTrans(new GenericTrans($loc));
        }
    }

    public function getId() {
        return $this->_id;
    }

    public function addTrans($trans) {
        if (is_null($this->trans)) {
            $this->trans = array();
        }
        array_push($this->trans, $trans);
    }
}