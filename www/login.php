<?php
require_once('../config.php');
require_once('Tools.php');
$user = Tools::scapeString($_POST['user']);
$pass = Tools::scapeString($_POST['pass']);
if(strtolower($user) == 'oliva'){
    echo '{'
    .'"response":200,'
    . '"user" :{'
            .'"name":"'.$user.'",'
            .'"age":21'
        .'}'
    .'}';
}else{
    echo '{"response" : 404}';
}