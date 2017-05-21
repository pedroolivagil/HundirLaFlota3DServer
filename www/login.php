<?php
require_once('config.php');
//$username = $_POST['user'];
$username = strtolower('oliva');
$password = $_POST['pass'];
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
    var_dump($user);
} else {
    var_dump(Tools::ErrorResponse());
}
var_dump(DB::getProblems());
DB::close_db();