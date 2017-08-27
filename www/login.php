<?php
/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: login.php
 * Date: 15/08/2017 02:37
 */
include_once('../config.php');
// $usermail = $_REQUEST[ 'usermail' ];
// $password = Tools::cryptString($_REQUEST[ 'password' ]);
$usermail = 'admin@hundirflota.es';
$password = Tools::cryptString('1234');
$autologin = $_REQUEST[ 'autologin' ];
$user = NULL;
// Buscar usuario
$uCont = new UserController();
if (Tools::verifyEmail($usermail)) {
    $user = $uCont->findAllByEmail($usermail);
} else {
    $user = $uCont->findAllByUsername($usermail);
}
// $user = new User();
if (Tools::isNotNull($user) && $user[ 0 ]->getPassword() === $password) {
    echo Tools::UnitySuccessResponse($user[ 0 ]);
} else {
    echo Tools::UnityErrorResponse();
}