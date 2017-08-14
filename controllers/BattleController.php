<?php
/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: BattleController.php
 * Date: 14/08/2017 21:21
 */

class BattleController extends _PersistenceManager {

    /**
     * ScenarioController constructor.
     */
    public function __construct() {
        parent::__construct(TABLE_BATTLE);
    }

    public function findById($id) {
        $key = array(
            COL_ID_BATTLE => $id
        );
        $result = parent::findOneByKey($key);
        if ($result != NULL) {
            return new Battle($result);
        }
        return FALSE;
    }

    public function create(Battle $data) {
        $result = FALSE;
        if (Tools::isNotNull($data->getCode())) {
            $key = array(
                COL_CODE        => $data->getCode(),
                COL_FLAG_ACTIVO => TRUE
            );
            $find = parent::exists($key);
            if (Tools::isNull($find)) {
                $idBattle = parent::count() + 1;
                $data->setIdBattle($idBattle);
                $trans = $data->getTrans();
                $data->setTrans(NULL);
                foreach ($trans as $loc) {
                    $data->addTrans($loc->asArray());
                }
                $result = parent::persist($data->serialize(array( COL_ID_DOCUMENT, COL_OBJECT )));
            }
        }
        return $result;
    }

    public function update(Battle $data) {
        $key = array( COL_ID_BATTLE => $data->getIdBattle() );
        return parent::merge($key, $data->serialize(array( COL_OBJECT )));
    }

    public function delete(Battle $data) {
        $key = array( COL_ID_BATTLE => $data->getIdBattle() );
        return parent::remove($key, $data->serialize(array( COL_OBJECT )));
    }
}