<?php
/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: ConstantsDB.php
 * Date: 09/08/2017 02:48
 */
// DB Constants
define('DB_HOST', 'ds123662.mlab.com');
define('DB_USER', 'userhundirlaflota3d');
define('DB_PASSWORD', '1ATN1pgkujiA8lW');
define('DB_DB', 'hundirlaflota3d');
define('DB_PORT', 23662);
// COLUMNAS ID
define('COL_ID_DOCUMENT', '_id');
define('COL_ID_USER', 'id_user');
define('COL_ID_IDIOMA', 'id_locale');
define('COL_ID_POWERUP', 'id_powerup');
define('COL_ID_RESOURCE', 'id_resource');
define('COL_ID_SCENARIO', 'id_scenario');
define('COL_ID_BATTLE', 'id_battle');
define('COL_ID_VESSEL', 'id_vessel');
define('COL_ID_WEAPON', 'id_weapon');
// COLUMNAS GENERICAS
define('COL_USERNAME', 'username');
define('COL_NAME', 'name');
define('COL_CODE', 'code');
define('COL_CODIGO_ISO', 'code_iso');
define('COL_FLAG_ACTIVO', 'flag_active');
define('COL_ADD_DATE', 'add_date');
define('COL_OBJECT', 'object');
//TABLAS PARA EL JUEGO
define('TABLE_USER', 'user');
define('TABLE_USER_INFO', 'user_info');
define('TABLE_USER_LOG', 'user_log');
define('TABLE_POWERUP', 'powerup');
define('TABLE_SCENARIO', 'scenario');
define('TABLE_BATTLE', 'Battle');
define('TABLE_BATTLE_REWARD', 'battle_reward');
define('TABLE_VESSEL', 'Battle');
define('TABLE_WEAPON', 'weapon');
define('TABLE_WEAPON_TYPE', 'weapon_type');
define('TABLE_RESOURCE', 'resource');
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