<?php
/* * ************************* */
/*           Config            */
/* * ************************* */
/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: config.php
 * Date: 09/08/2017 02:48
 */
error_reporting(E_ALL ^ E_NOTICE);
define('EXPIRE', time() + (2 * 24 * 60 * 60));     // 2 dias; 24 horas; 60 min; 60 s
define('MAXFILESIZE', ini_get('upload_max_filesize') * 1024);  // En KB -> 3MB
define('MAXDIRSIZE', 524288);    // en KB -> 512MB
define('EMPRESA', 'OliLogicStudios S.L.');
define('MAILTECNICO', 'olivadevelop@gmail.com');
define('LOCALE', 'es');
define('LIMIT_RESULT_LIST', 3);
define('LIMIT_PAGINATOR_NUMS', 10);
// PDIGen Constants
define('DOWNLOAD', 'D');
define('SHOWBROWSER', 'I');
define('SAVETOURL', 'F');
define('TOSTRING', 'S');
define('FONTDEFAULT', 12);
define('FONTEXTRA', 14);
define('FONTCOLORDEF', 50);
define('FONTCOLOR120', 180);
define('CRYPT_KEY', 'hUndIrLaFlota3DOliLogiCSTudiOsolivadevelop');
define('SESSION_USUARIO', 'usuario');
define('SESSION_USUARIO_ID', 'id_usuario');
define('SESSION_AUTOLOGIN', 'autologin');
define('IP_UPKEEP', '83.46.27.12');
define('EXTENSION_LOG', '.log');
define('LOG_ACTIVE', FALSE);
define('EXTENSION_RESOURCE', '.resource');
// '/myprojectsorg' solo para ámbito local
define('PORT', 8080);
$port = ':' . PORT;
$root = ($_SERVER[ 'SERVER_NAME' ] == 'localhost') ? '/HundirLaFlota3DServer' : '';
if (defined(UNIT_TEST)) {
    if (UNIT_TEST) {
        $root = '/HundirLaFlota3DServer';
    }
}
$rootPath = $_SERVER[ 'DOCUMENT_ROOT' ];
if (defined(UNIT_TEST)) {
    if (UNIT_TEST) {
        $rootPath = 'C:\xampp\htdocs';
    }
}
define('_CONTROLLERS_PATH_', $rootPath . $root . '/controllers/');
define('_CLASES_PATH_', $rootPath . $root . '/controllers/clases/');
define('_MODELS_PATH_', $rootPath . $root . '/models/');
define('_LOGS_PATH_', $rootPath . $root . '/logs/');
define('_IMAGE_PATH_', $rootPath . $root . '/img/');
define('_RESOURCE_PATH_', $rootPath . $root . '/resources/');
//define('_PAGES_PATH_', $rootPath . $root . '/www/');
//define('_PHP_PATH_', $rootPath . $root . '/www/php/');
//define('_TEMP_PATH_', $rootPath . $root . '/temp/');
//define('_FORM_PATH_', $rootPath . $root . '/forms/');
//define('_USER_PATH_', $rootPath . $root . '/clients/');
//define('_ROOT_PATH_', 'http://' . $_SERVER['SERVER_NAME'] . $port . $root . '/');
//define('_IMAGE_PATH_', 'http://' . $_SERVER['SERVER_NAME'] . $port . $root . '/img/');
//define('_CSS_PATH_', 'http://' . $_SERVER['SERVER_NAME'] . $port . $root . '/css/');
//define('_JS_PATH_', 'http://' . $_SERVER['SERVER_NAME'] . $port . $root . '/js/');
//define('_DOCS_PATH_', 'http://' . $_SERVER['SERVER_NAME'] . $port . $root . '/docs/');
//session_start(); // no hace falta gracias al .htaccess
//ini_set('display_errors',1);
// header('Content-type: text/html; charset=utf-8');
// Classes
require_once(_CLASES_PATH_ . 'ConstantsDB.php');
require_once(_CLASES_PATH_ . 'Tools.php');
require_once(_CLASES_PATH_ . 'vendor/autoload.php');
require_once(_CLASES_PATH_ . 'DBMethods.php');
require_once(_CLASES_PATH_ . 'DB.php');
// Models
require_once(_MODELS_PATH_ . '_EntitySerialize.php');
require_once(_MODELS_PATH_ . 'UserLog.php');
require_once(_MODELS_PATH_ . 'GenericTrans.php');
require_once(_MODELS_PATH_ . 'Resource.php');
require_once(_MODELS_PATH_ . 'LocaleApp.php');
require_once(_MODELS_PATH_ . 'UserInfo.php');
require_once(_MODELS_PATH_ . 'User.php');
require_once(_MODELS_PATH_ . 'PowerUp.php');
require_once(_MODELS_PATH_ . 'scenario/Battle.php');
require_once(_MODELS_PATH_ . 'scenario/Scenario.php');
require_once(_MODELS_PATH_ . 'scenario/Buque.php');
require_once(_MODELS_PATH_ . 'scenario/Weapon.php');
// Controllers
require_once(_CONTROLLERS_PATH_ . '_PersistenceManager.php');
require_once(_CONTROLLERS_PATH_ . 'LocaleAppController.php');
require_once(_CONTROLLERS_PATH_ . 'UserController.php');
require_once(_CONTROLLERS_PATH_ . 'PowerUpController.php');
require_once(_CONTROLLERS_PATH_ . 'ResourceController.php');
require_once(_CONTROLLERS_PATH_ . 'ScenarioController.php');
