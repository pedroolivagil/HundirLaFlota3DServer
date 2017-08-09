<?php
/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: estructura.php
 * Date: 09/08/2017 02:48
 */
include_once('../config.php');
include_once('../controllers/clases/Tools.php');
include_once('ScriptDB.php');
Tools::logout();
$script = new ScriptDB();
$script->initCleanDB();
$script->initCreateDB();
