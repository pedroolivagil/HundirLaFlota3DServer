<?php

require_once('config.php');

var_dump(Tools::getSession());
echo Tools::getRealIP();
//header('Content-type: application/json; charset=utf-8');

echo "<br /><br />--------------------------------------------------------------------<br />";
$localeMgr = new LocaleController();
$locale = $localeMgr->findById(1);
var_dump($locale);

echo "<br /><br />--------------------------------------------------------------------<br />";
$userMgr = new UserController();
$user = $userMgr->findById(1);
var_dump($user);
