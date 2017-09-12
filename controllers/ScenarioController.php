<?php

/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: ScenarioController.php
 * Date: 13/08/2017 21:48
 */
class ScenarioController extends _PersistenceManager {

    /**
     * ScenarioController constructor.
     */
    public function __construct() {
        parent::__construct(TABLE_SCENARIO);
    }

    public function findById($id, $fullObject = FALSE) {
        $key = array(
            COL_ID_SCENARIO => (int)$id
        );
        $result = parent::findOneByKey($key);
        if ($result != NULL) {
            $obj = new Scenario($result);
            if ($fullObject) {
                $resCon = new ResourceController();
                $obj->setResource($resCon->findById($obj->getResource()));
                $citCon = new CityController();
                $cities = array();
                foreach ($obj->getCities() as $idCity) {
                    array_push($cities, $citCon->findById($idCity));
                }
                $obj->setCities($cities);
            }
            return $obj;
        }
        return FALSE;
    }

    public function create(Scenario $data) {
        $result = FALSE;
        if (Tools::isNotNull($data->getCode())) {
            $key = array(
                COL_CODE        => $data->getCode(),
                COL_FLAG_ACTIVO => TRUE
            );
            $find = parent::exists($key);
            if (Tools::isNull($find)) {
                $idScenario = parent::count() + 1;
                $data->setIdScenario($idScenario);
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

    public function update(Scenario $data) {
        $key = array( COL_ID_SCENARIO => $data->getIdScenario() );
        return parent::merge($key, $data->serialize(array( COL_OBJECT )));
    }

    public function delete(Scenario $data) {
        $key = array( COL_ID_SCENARIO => $data->getIdScenario() );
        return parent::remove($key, $data->serialize(array( COL_OBJECT )));
    }
}