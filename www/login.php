<?php
require_once('../config.php');
require_once('Tools.php');
$user = Tools::scapeString($_POST['user']);
$pass = Tools::scapeString($_POST['pass']);
if(strtolower($user) == 'oliva'){
    echo '{'
    .'"response":200,'
    . '"user" :{'
            .'"id_user":"000011100",'
            .'"username":"'.$user.'",'
            .'"email":"pedro_oliva@test@mail",'
            .'"flag_active":"true",'
        .'}'
    .'}';
}else{
    echo '{"response" : 404}';
}