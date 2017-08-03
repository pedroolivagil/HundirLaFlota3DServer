<?php

// DB Constants
define('DB_HOST', 'ds123662.mlab.com');
define('DB_USER', 'userhundirlaflota3d');
define('DB_PASSWORD', '1ATN1pgkujiA8lW');
define('DB_DB', 'hundirlaflota3d');
define('DB_PORT', 23662);

define('COL_ID_DOCUMENT', '_id');
define('COL_ID_USER', 'id_user');
define('COL_ID_IDIOMA', 'id_locale');
define('COL_ID_POWERUP', 'id_powerup');

define('COL_USERNAME', 'username');
define('COL_CODE', 'code');
define('COL_CODIGO_ISO', 'code_iso');
define('COL_FLAG_ACTIVO', 'flag_active');
define('COL_OBJECT', 'object');

//TABLASPARA EL JUEGO
define('TABLE_USER', 'user');
define('TABLE_USER_INFO', 'user_info');
define('TABLE_USER_LOG', 'user_log');
define('TABLE_POWERUP', 'powerup');
define('TABLE_SCENARIO', 'scenario');
define('TABLE_BATTLE', 'battle');
define('TABLE_BATTLE_REWARD', 'battle_reward');
define('TABLE_BATTLE_TYPE', 'battle_type');
define('TABLE_VESSEL', 'vessel');
define('TABLE_WEAPON', 'weapon');
define('TABLE_WEAPON_TYPE', 'weapon_type');

// TABLAS PARA RELACIONES
define('TABLE_USER_GAME_LIST', 'user_game_list');
define('TABLE_USER_POWERUP', 'user_powerup');
define('TABLE_SCENARIO_BATTLE', 'scenario_battle');

// TABLAS PARA LA APLICACIÓN
define('TABLE_APP_TEXT', 'app_text');
define('TABLE_APP_LOCALE', 'app_locale');
//define('TABLE_APP_', '');
//define('TABLE_APP_', '');
//define('TABLE_APP_', '');