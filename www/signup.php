<?php
/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: signup.php
 * Date: 29/08/2017 02:18
 */
include_once('../config.php');
$username = $_POST[ 'username' ];
$password = Tools::cryptString($_POST[ 'password' ]);
$email = $_POST[ 'email' ];
$user = new User();
$user->setUsername($username);
$user->setEmail($email);
$user->setPassword($password);
$uCont = new UserController();
if (Tools::verifyEmail($email)) {
    if ($uCont->create($user)) {
        echo Tools::UnitySuccessResponse($user);
    } else {
        echo Tools::UnityErrorResponse("ERROR_USER_EXIST");
    }
} else {
    echo Tools::UnityErrorResponse("ERROR_USERMAIL_BAD");
}