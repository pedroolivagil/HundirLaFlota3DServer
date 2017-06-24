<?php

include_once('ScriptDB.php');
//header('Content-type: application/json; charset=utf-8');

$script = new ScriptDB();
$script->loadDefaultData();