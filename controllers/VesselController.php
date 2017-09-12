<?php
/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: BattleController.php
 * Date: 14/08/2017 21:21
 */

class VesselController extends _PersistenceManager {

    /**
     * ScenarioController constructor.
     */
    public function __construct() {
        parent::__construct(TABLE_VESSEL);
    }

    public function findById($id) {
        $key = array(
            COL_ID_VESSEL => (int)$id
        );
        $result = parent::findOneByKey($key);
        if ($result != NULL) {
            return new Vessel($result);
        }
        return FALSE;
    }

    public function create(Vessel $data) {
        $result = FALSE;
        if (Tools::isNotNull($data->getCode())) {
            $key = array(
                COL_CODE        => $data->getCode(),
                COL_FLAG_ACTIVO => TRUE
            );
            $find = parent::exists($key);
            if (Tools::isNull($find)) {
                $idBattle = parent::count() + 1;
                $data->setIdVessel($idBattle);
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

    public function update(Vessel $data) {
        $key = array( COL_ID_VESSEL => $data->getIdVessel() );
        return parent::merge($key, $data->serialize(array( COL_OBJECT )));
    }

    public function delete(Vessel $data) {
        $key = array( COL_ID_VESSEL => $data->getIdVessel() );
        return parent::remove($key, $data->serialize(array( COL_OBJECT )));
    }
}