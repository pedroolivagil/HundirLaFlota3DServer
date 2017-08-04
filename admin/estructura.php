<?php
include_once('../config.php');
include_once('../controllers/clases/Tools.php');
include_once('ScriptDB.php');
Tools::logout();
$script = new ScriptDB();
$script->initCleanDB();
$script->initCreateDB();
