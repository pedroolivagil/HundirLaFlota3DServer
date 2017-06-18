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

// DB Constants
define('DB_HOST', 'ds123662.mlab.com');
define('DB_USER', 'userhundirlaflota3d');
define('DB_PASSWORD', '1ATN1pgkujiA8lW');
define('DB_DB', 'hundirlaflota3d');
define('DB_PORT', 23662);

define('CRYPT_KEY', 'hUndIrLaFlota3DOliLogiCSTudiOsolivadevelop');
define('SESSION_USUARIO_ID', 'id_usuario');
define('SESSION_USUARIO_NAME', 'name_usuario');
define('SESSION_AUTOLOGIN', 'autologin');

// Columns
define('FLAG_ACTIVO','flag_activo');

// '/myprojectsorg' solo para ámbito local
$port = ':' . PORT;
$root = ($_SERVER['SERVER_NAME'] == 'localhost') ? '/HundirLaFlota3DServer' : '';
//define('MAILBODY_NEWUSER', $_SERVER['DOCUMENT_ROOT'] . $root . '/forms/newuser.txt');
//define('MAILBODY_NEWORDER', $_SERVER['DOCUMENT_ROOT'] . $root . '/forms/neworder.txt');
//define('MAILBODY_CONTACT', $_SERVER['DOCUMENT_ROOT'] . $root . '/forms/contact.txt');
//define('MAILBODY_RECOVERY', $_SERVER['DOCUMENT_ROOT'] . $root . '/forms/recovery.txt');
//define('_LEGAL_FILE_', 'legal.txt');

define('_CLASS_PATH_', $_SERVER['DOCUMENT_ROOT'] . $root . '/www/clases/');
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
require_once(_CLASS_PATH_ . 'Tools.php');
require_once(_CLASS_PATH_ . 'Queries.php');
require_once(_CLASS_PATH_ . 'DB.php');
require_once(_CLASS_PATH_ . 'BasicMethods.php');
require_once(_CLASS_PATH_ . 'BasicMethodsEntities.php');
require_once(_CLASS_PATH_ . 'EntityManager.php');
require_once(_CLASS_PATH_ . 'PersistenceManager.php');
//// Persistence
require_once(_CLASS_PATH_ . 'entities/User.php');
error_reporting(E_ALL ^ E_NOTICE);
