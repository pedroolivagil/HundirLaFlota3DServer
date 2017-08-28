<?php
/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: login.php
 * Date: 15/08/2017 02:37
 */
include_once('../config.php');
$usermail = $_POST[ 'usermail' ];
$password = Tools::cryptString($_POST[ 'password' ]);
$user = NULL;
// Buscar usuario
$uCont = new UserController();
if (Tools::verifyEmail($usermail)) {
    $user = $uCont->findAllByEmail($usermail);
} else {
    $user = $uCont->findAllByUsername($usermail);
}
if (Tools::isNotNull($user) && $user[ 0 ]->getPassword() === $password) {
    echo Tools::UnitySuccessResponse($user[ 0 ]);
} else {
    echo Tools::UnityErrorResponse();
}