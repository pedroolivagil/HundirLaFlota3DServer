<?php
/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: BattleController.php
 * Date: 14/08/2017 21:21
 */

class ProfileAIController extends _PersistenceManager {

    /**
     * ScenarioController constructor.
     */
    public function __construct() {
        parent::__construct(TABLE_PROFILE_AI);
    }

    public function findById($id) {
        $key = array(
            COL_ID_PROFILE_AI => $id
        );
        $result = parent::findOneByKey($key);
        if ($result != NULL) {
            return new ProfileAI($result);
        }
        return FALSE;
    }

    public function create(ProfileAI $data) {
        var_dump($data);
        $result = FALSE;
        if (Tools::isNotNull($data->getCode())) {
            $key = array(
                COL_CODE        => $data->getCode(),
                COL_FLAG_ACTIVO => TRUE
            );
            $find = parent::exists($key);
            if (Tools::isNull($find)) {
                $idProfileAI = parent::count() + 1;
                $data->setIdProfileAi($idProfileAI);
                $result = parent::persist($data->serialize(array( COL_ID_DOCUMENT, COL_OBJECT )));
            }
        }
        return $result;
    }

    public function update(ProfileAI $data) {
        $key = array( COL_ID_PROFILE_AI => $data->getIdProfileAi() );
        return parent::merge($key, $data->serialize(array( COL_OBJECT )));
    }

    public function delete(ProfileAI $data) {
        $key = array( COL_ID_PROFILE_AI => $data->getIdProfileAi() );
        return parent::remove($key, $data->serialize(array( COL_OBJECT )));
    }
}