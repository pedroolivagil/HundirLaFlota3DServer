<?php

/* * ************************* */
/*   MyProjectsOrg.com Config  */
/* * ************************* */

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
define('SESSION_USUARIO_ID', 'id_usuario');
define('SESSION_USUARIO_NAME', 'name_usuario');
define('SESSION_AUTOLOGIN', 'autologin');

// Columns
define('FLAG_ACTIVO', 'flag_activo');

// '/myprojectsorg' solo para ámbito local
define('PORT', 8080);
$port = ':' . PORT;
$root = ($_SERVER['SERVER_NAME'] == 'localhost') ? '/HundirLaFlota3DServer' : '';
//define('MAILBODY_NEWUSER', $_SERVER['DOCUMENT_ROOT'] . $root . '/forms/newuser.txt');
//define('MAILBODY_NEWORDER', $_SERVER['DOCUMENT_ROOT'] . $root . '/forms/neworder.txt');
//define('MAILBODY_CONTACT', $_SERVER['DOCUMENT_ROOT'] . $root . '/forms/contact.txt');
//define('MAILBODY_RECOVERY', $_SERVER['DOCUMENT_ROOT'] . $root . '/forms/recovery.txt');
//define('_LEGAL_FILE_', 'legal.txt');

define('_CONTROLLERS_PATH_', $_SERVER['DOCUMENT_ROOT'] . $root . '/controllers/');
define('_CLASES_PATH_', $_SERVER['DOCUMENT_ROOT'] . $root . '/controllers/clases/');
define('_MODELS_PATH_', $_SERVER['DOCUMENT_ROOT'] . $root . '/models/');
//define('_PAGES_PATH_', $_SERVER['DOCUMENT_ROOT'] . $root . '/www/');
//define('_PHP_PATH_', $_SERVER['DOCUMENT_ROOT'] . $root . '/www/php/');
//define('_TEMP_PATH_', $_SERVER['DOCUMENT_ROOT'] . $root . '/temp/');
//define('_FORM_PATH_', $_SERVER['DOCUMENT_ROOT'] . $root . '/forms/');
//define('_USER_PATH_', $_SERVER['DOCUMENT_ROOT'] . $root . '/clients/');
//define('_ROOT_PATH_', 'http://' . $_SERVER['SERVER_NAME'] . $port . $root . '/');
//define('_IMAGE_PATH_', 'http://' . $_SERVER['SERVER_NAME'] . $port . $root . '/img/');
//define('_CSS_PATH_', 'http://' . $_SERVER['SERVER_NAME'] . $port . $root . '/css/');
//define('_JS_PATH_', 'http://' . $_SERVER['SERVER_NAME'] . $port . $root . '/js/');
//define('_DOCS_PATH_', 'http://' . $_SERVER['SERVER_NAME'] . $port . $root . '/docs/');
//session_start(); // no hace falta gracias al .htaccess
//ini_set('display_errors',1);
header('Content-type: text/html; charset=utf-8');
// Controllers
require_once(_CLASES_PATH_ . 'ConstantsDB.php');
require_once(_CLASES_PATH_ . 'Tools.php');
require_once(_CLASES_PATH_ . 'vendor/autoload.php');
require_once(_CLASES_PATH_ . 'DBMethods.php');
require_once(_CLASES_PATH_ . 'DB.php');
require_once(_CONTROLLERS_PATH_ . '_PersistenceManager.php');
require_once(_CONTROLLERS_PATH_ . 'UserController.php');
require_once(_CONTROLLERS_PATH_ . 'ShipController.php');
// Models
require_once(_MODELS_PATH_ . '_EntitySerialize.php');
require_once(_MODELS_PATH_ . 'User.php');
require_once(_MODELS_PATH_ . 'Ship.php');

error_reporting(E_ALL ^ E_NOTICE);
