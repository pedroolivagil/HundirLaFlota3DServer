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
    $scenarioCon = new ScenarioController();
    $userGame = $userGameCon->findByUserId($idUser, TRUE);
    // var_dump($userGame);
    echo $userGame->serialize();
    // echo json_encode($userGame->getVars(), JSON_PRETTY_PRINT);
    // var_dump(Tools::UnitySuccessResponse($userGame));
} else {
    echo Tools::UnityErrorResponse("ERROR_NO_USER_GAME");
}
