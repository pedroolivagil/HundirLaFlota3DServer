<?php

/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: ResourceController.php
 * Date: 09/08/2017 02:48
 */
class ResourceController extends _PersistenceManager {

    public function __construct() {
        parent::__construct(TABLE_RESOURCE);
    }

    public function findById($id) {
        $key = array(
            COL_ID_RESOURCE => (int)$id
        );
        $result = parent::findOneByKey($key);
        if ($result != NULL) {
            return new Resource($result);
        }
        return FALSE;
    }

    public function create(Resource $data) {
        $result = FALSE;
        if (Tools::isNotNull($data->getName())) {
            $key = array(
                COL_NAME        => $data->getName(),
                COL_FLAG_ACTIVO => TRUE
            );
            $find = parent::exists($key);
            if (Tools::isNull($find)) {
                $idResource = parent::count() + mt_rand(1, 50);
                $data->setIdResource($idResource);
                $result = parent::persist($data->serialize(array( COL_ID_DOCUMENT, COL_OBJECT )));
                // $dbPersist = parent::persist($data->serialize(array( COL_ID_DOCUMENT, COL_OBJECT, "file" )));
                // $filePersist = $this->addResource($data);
                // $result = $dbPersist && $filePersist;
                // // En caso de que algo falle y no se persista correctamente, deshacemos los cambios
                // if ($result == FALSE && $dbPersist) {
                //     //se ha persistido en db pero no en fichero
                //     $this->delete($data);
                // }
                // if ($result == FALSE && $filePersist) {
                //     //se ha persistido en fichero pero no en db
                //     $this->removeResource($data);
                // }
            }
        }
        return $result;
    }

    public function delete(Resource $data) {
        $key = array( COL_NAME => $data->getName() );
        return parent::remove($key, $data->serialize(array( COL_OBJECT )));
    }

    public function destroy(Resource $data) {
        $dbRemove = $this->delete($data);
        $fileRemove = $this->removeResource($data);
        $result = $dbRemove && $fileRemove;
        // En caso de que algo falle y no se elimine correctamente, deshacemos los cambios
        if ($result == FALSE && $dbRemove) {
            //se ha persistido en db pero no en fichero
            $this->create($data);
        }
        if ($result == FALSE && $fileRemove) {
            //se ha persistido en fichero pero no en db
            $this->addResource($data);
        }
    }

    private function addResource(Resource $resource) {
        $filename = $resource->getName() . EXTENSION_RESOURCE;
        $file = fopen(_RESOURCE_PATH_ . TABLE_RESOURCE . '/' . $filename, "w");
        $retorno = fwrite($file, $resource->getFile() . PHP_EOL);
        fclose($file);
        return $retorno;
    }

    private function removeResource($resource) {
        $retorno = FALSE;
        if ($resource != NULL) {
            $url = NULL;
            if ($resource instanceof Resource) {
                $url = _RESOURCE_PATH_ . TABLE_RESOURCE . '/' . $resource->getName() . EXTENSION_RESOURCE;
            } else {
                $res = $this->findById($resource);
                $this->removeResource($res);
            }
            if (file_exists($url)) {
                chmod($url, 0777);
                $retorno = unlink($url);
            }
        }
        return $retorno;
    }
}
