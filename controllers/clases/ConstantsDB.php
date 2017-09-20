<?php
/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: ConstantsDB.php
 * Date: 09/08/2017 02:48
 */
// DB Constants
// mLabServer
// define('DB_HOST', 'ds123662.mlab.com');
// define('DB_USER', 'userhundirlaflota3d');
// define('DB_PASSWORD', '1ATN1pgkujiA8lW');
// define('DB_DB', 'hundirlaflota3d');
// define('DB_PORT', 23662);
// Localhost
define('DB_HOST', '192.168.1.34');
define('DB_USER', 'admin');
define('DB_PASSWORD', 'oreo_20081991_Aa');
define('DB_DB', 'hundirFlota');
define('DB_PORT', 27018);
// COLUMNAS ID
define('COL_ID_BANK', 'id_bank');
define('COL_ID_BATTLE', 'id_battle');
define('COL_ID_CITY', 'id_city');
define('COL_ID_DOCUMENT', '_id');
define('COL_ID_IDIOMA', 'id_locale');
define('COL_ID_INVENTORY', 'id_inventory');
define('COL_ID_ITEM', 'id_item');
define('COL_ID_MARKET', 'id_market');
define('COL_ID_POWERUP', 'id_powerup');
define('COL_ID_PROFILE_AI', 'id_profile_ai');
define('COL_ID_RESOURCE', 'id_resource');
define('COL_ID_SCENARIO', 'id_scenario');
define('COL_ID_USER', 'id_user');
define('COL_USER_GAME_USER', 'user');
define('COL_ID_USER_GAME', 'id_user_game');
define('COL_ID_VESSEL', 'id_vessel');
define('COL_ID_WEAPON', 'id_weapon');
// COLUMNAS GENERICAS
define('COL_USERNAME', 'username');
define('COL_EMAIL', 'email');
define('COL_NAME', 'name');
define('COL_CODE', 'Code');
define('COL_CODIGO_ISO', 'code_iso');
define('COL_FLAG_ACTIVO', 'FlagActive');
define('COL_ADD_DATE', 'EntryDate');
define('COL_OBJECT', 'object');
//TABLAS PARA EL JUEGO
define('TABLE_USER', 'User');
define('TABLE_USER_LOG', 'user_log');       // No en db
define('TABLE_POWERUP', 'Powerup');
define('TABLE_SCENARIO', 'Scenario');
define('TABLE_CITY', 'City');
define('TABLE_MARKET', 'Market');
define('TABLE_BATTLE', 'Battle');
define('TABLE_BANK', 'Bank');
define('TABLE_ITEM', 'Item');
define('TABLE_INVENTORY', 'Inventory');
define('TABLE_VESSEL', 'Vessel');
define('TABLE_WEAPON', 'Weapon');
define('TABLE_RESOURCE', 'Resource');
define('TABLE_PROFILE_AI', 'ProfileAI');
// TABLAS PARA RELACIONES
define('TABLE_USER_GAME', 'UserGame');
// TABLAS PARA LA APLICACIÓN
define('TABLE_APP_TEXT', 'AppText');
define('TABLE_APP_LOCALE', 'AppLocale');
//define('TABLE_APP_', '');
//define('TABLE_APP_', '');
//define('TABLE_APP_', '');