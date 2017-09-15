<?php
/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: usergame.php
 * Date: 12/09/2017 20:03
 */
include_once('../config.php');
$idUser = $_REQUEST[ 'idUser' ];
if (Tools::isNotNull($idUser)) {
    $userGameCon = new UserGameController();
    $userGame = $userGameCon->findByUserId($idUser, TRUE);
    $response = '{';
    $response .= '"response":200';
    $response .= ',"userGame":' . $userGame->serialize();
    $response .= ',"bank":' . $userGame->getBank()->serialize();
    $response .= ',"scenario":' . $userGame->getScenario()->serialize();
    $response .= ',"scenarioResource":' . $userGame->getScenario()->getResource();
    $response .= ',"user":' . $userGame->getUser()->serialize();
    $response .= '}';
    echo $response;
    // var_dump(Tools::UnitySuccessResponse($userGame));
} else {
    echo Tools::UnityErrorResponse("ERROR_NO_USER_GAME");
}
