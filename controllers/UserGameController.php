<?php

/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: UserGameController.php
 * Date: 13/08/2017 21:48
 */
class UserGameController extends _PersistenceManager {

    /**
     * UserGameController constructor.
     */
    public function __construct() {
        parent::__construct(TABLE_USER_GAME);
    }

    public function findById($id, $fullObject = FALSE) {
        $key = array(
            COL_ID_USER_GAME => (int)$id
        );
        $result = parent::findOneByKey($key);
        if ($result != NULL) {
            $obj = new UserGame($result);
            if ($fullObject) {
                $scenarioCon = new ScenarioController();
                $obj->setScenario($scenarioCon->findById($obj->getScenario(), TRUE));
                $userCon = new UserController();
                $obj->setUser($userCon->findById($obj->getUser()));
                $bankCon = new BankController();
                $obj->setBank($bankCon->findById($obj->getBank()));
            }
            return $obj;
        }
        return FALSE;
    }

    public function findByUserId($id, $fullObject = FALSE) {
        $key = array(
            COL_USER_GAME_USER => (int)$id
        );
        $result = parent::findOneByKey($key);
        if ($result != NULL) {
            $obj = new UserGame($result);
            if ($fullObject) {
                $scenarioCon = new ScenarioController();
                $obj->setScenario($scenarioCon->findById($obj->getScenario(), TRUE));
                $userCon = new UserController();
                $obj->setUser($userCon->findById($obj->getUser()));
                $bankCon = new BankController();
                $obj->setBank($bankCon->findById($obj->getBank()));
            }
            return $obj;
        }
        return FALSE;
    }

    public function create(UserGame $data) {
        $result = FALSE;
        if (Tools::isNotNull($data->getUser()) && Tools::isNotNull($data->getScenario())) {
            $key = array(
                COL_ID_USER     => $data->getUser(),
                COL_ID_SCENARIO => $data->getScenario(),
                COL_FLAG_ACTIVO => TRUE
            );
            $find = parent::exists($key);
            if (Tools::isNull($find)) {
                $idUserGame = parent::count() + 1;
                $data->setIdUserGame($idUserGame);
                $result = parent::persist($data->serialize(array( COL_ID_DOCUMENT, COL_OBJECT )));
            }
        }
        return $result;
    }

    public function update(UserGame $data) {
        $key = array( COL_ID_USER_GAME => $data->getIdUserGame() );
        return parent::merge($key, $data->serialize(array( COL_OBJECT )));
    }

    public function delete(UserGame $data) {
        $key = array( COL_ID_USER_GAME => $data->getIdUserGame() );
        return parent::remove($key, $data->serialize(array( COL_OBJECT )));
    }
}