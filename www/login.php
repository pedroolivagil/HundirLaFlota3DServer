<?php

require_once('config.php');
//$username = $_POST['user'];
$username = strtolower('oliva');
$password = $_POST['pass'];
DB::init_db();
$user = User::findByUserName($username);
if ($user) {
//    echo '{'
//    .'"response":200,'
//    . '"user" :{'
//            .'"id_user":"000011100",'
//            .'"username":"'.$user.'",'
//            .'"email":"pedro_oliva@test@mail",'
//            .'"flag_active":"true",'
//        .'}'
//    .'}';
    print_r($user);
} else {
    print_r(Tools::ErrorResponse());
}
DB::close_db();