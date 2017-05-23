<?php
require_once('config.php');
DB::GetInstance()->init_db();
//$username = $_POST['user'];
$username = strtolower('oliva');
$password = $_POST['pass'];
$user = new User();
var_dump(DB::GetInstance()->findAll("usuario"));
var_dump($user->getEm()->findByParam(UsuarioFindByUserName, $username));
$user->findByUserName($username);
if ($user->getId_usuario() != NULL) {
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
var_dump(DB::GetInstance()->getProblems());
DB::GetInstance()->close_db();