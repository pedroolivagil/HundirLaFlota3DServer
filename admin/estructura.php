<?php

include_once('ScriptDB.php');

$script = new ScriptDB();
$script->initCleanDB();
$script->initCreateDB();