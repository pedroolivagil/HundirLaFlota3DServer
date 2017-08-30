<?php
/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: recovery_pass.php
 * Date: 30/08/2017 20:52
 */
include_once('../config.php');
$email = $_POST[ 'email' ];
$uCont = new UserController();
$user = $uCont->findAllByEmail($email);
if (Tools::verifyEmail($email)) {
    if (Tools::isNotNull($user)) {
        /*
         * Marcar la cuenta como pendiente de recuperar en una tabla aparte
         * dónde se guardará la contraseña vieja y al terminar la recuperación
         * se modificará la contraseña del usuario
         */
        echo Tools::UnitySuccessResponseText("INFO_SUCCESS_EMAIL_RECOVERY");
    } else {
        echo Tools::UnityErrorResponse("ERROR_USER_EXIST");
    }
} else {
    echo Tools::UnityErrorResponse("ERROR_USERMAIL_BAD");
}