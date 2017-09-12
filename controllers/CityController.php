<?php
/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: CityController.php
 * Date: 14/08/2017 21:21
 */

class CityController extends _PersistenceManager {

    /**
     * ScenarioController constructor.
     */
    public function __construct() {
        parent::__construct(TABLE_CITY);
    }

    public function findById($id) {
        $key = array(
            COL_ID_CITY => (int)$id
        );
        $result = parent::findOneByKey($key);
        if ($result != NULL) {
            return new City($result);
        }
        return FALSE;
    }

    public function create(City $data) {
        $result = FALSE;
        if (Tools::isNotNull($data->getCode())) {
            $key = array(
                COL_CODE        => $data->getCode(),
                COL_FLAG_ACTIVO => TRUE
            );
            $find = parent::exists($key);
            if (Tools::isNull($find)) {
                $idCity = parent::count() + 1;
                $data->setIdCity($idCity);
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

    public function update(City $data) {
        $key = array( COL_ID_CITY => $data->getIdCity() );
        return parent::merge($key, $data->serialize(array( COL_OBJECT )));
    }

    public function delete(City $data) {
        $key = array( COL_ID_CITY => $data->getIdCity() );
        return parent::remove($key, $data->serialize(array( COL_OBJECT )));
    }
}