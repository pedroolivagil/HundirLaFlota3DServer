<?php

/**
 * Description of UserController
 *
 * @author Oliva
 */
class ResourceController extends _PersistenceManager {

    public function __construct() {
        parent::__construct(TABLE_RESOURCE);
    }

    public function findById($id) {
        $key = array(
            COL_ID_POWERUP => $id
        );
        $result = parent::findOneByKey($key);
        if ($result != NULL) {
            return new Resource($result);
        }
        return FALSE;
    }

    public function create($data) {
        $key = array(
            COL_NAME        => $data->getName(),
            COL_FLAG_ACTIVO => TRUE
        );
        $find = parent::exists($key);
        if (is_null($find)) {
            $idPowerup = parent::count() + 1;
            $data->setIdResource($idPowerup);
            $data->setAddDate(time());
            $data->setFlagActive(TRUE);
            return parent::persist($data->serialize(array( COL_ID_DOCUMENT, COL_OBJECT )));
        }
        return FALSE;
    }

    public function update($data) {
        $key = array( COL_NAME => $data->getName() );
        return parent::merge($key, $data->serialize(array( COL_OBJECT )));
    }

    public function delete($data) {
        $key = array( COL_NAME => $data->getName() );
        return parent::remove($key, $data->serialize(array( COL_OBJECT )));
    }
}
