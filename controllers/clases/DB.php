<?php

/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: DB.php
 * Date: 09/08/2017 02:48
 */
class DB implements DBMethods {

    private static $instance;
    private $manager;
    private $_id;

    public static function getInstance() {
        if (Tools::isNull(self::$instance)) {
            self::$instance = new DB();
            self::$instance->_id = time();
        }
        return self::$instance;
    }

    public function getId() {
        return $this->_id;
    }

    public function getManager() {
        return $this->manager;
    }

    private function __construct() {
        $uri = "mongodb://" . DB_USER . ":" . DB_PASSWORD . "@" . DB_HOST . ":" . DB_PORT . "/" . DB_DB;
        $this->manager = new MongoClient($uri);
    }

    /**
     * Busca todos los registros
     * @param $collectionName
     * @return MongoCursor|null
     */
    public function find($collectionName) {
        $retorno = NULL;
        try {
            $collection = $this->manager->selectCollection(DB_DB, $collectionName);
            $retorno = $collection->find();
        } catch (Exception $e) {
        }
        return $retorno;
    }

    /**
     * Busca registros basados en la clave
     * @param $collectionName
     * @param $key
     * @return MongoCursor|null
     */
    public function findByKey($collectionName, $key) {
        $retorno = NULL;
        try {
            $collection = $this->manager->selectCollection(DB_DB, $collectionName);
            $retorno = $collection->find($key);
        } catch (Exception $e) {
        }
        return $retorno;
    }

    /**
     * Busca un solo registro basado en la clave
     * @param $collectionName
     * @param $key
     * @return array|null
     */
    public function findOneByKey($collectionName, $key) {
        $retorno = NULL;
        try {
            $collection = $this->manager->selectCollection(DB_DB, $collectionName);
            $retorno = $collection->findOne($key);
        } catch (Exception $e) {
        }
        return $retorno;
    }

    /**
     * Crea un documento en la colección
     * @param null $collectionName
     * @param null $data
     * @return array|bool
     */
    public function persist($collectionName = NULL, $data = NULL) {
        $retorno = FALSE;
        try {
            $collection = $this->manager->selectCollection(DB_DB, $collectionName);
            $retorno = $collection->insert($data);
        } catch (Exception $e) {
        }
        return $retorno;
    }

    /**
     * Borra un documento de manera superficial. Solo desactiva el documento con un bool
     * @param null $collectionName
     * @param null $key
     * @param null $data
     * @return bool
     */
    public function remove($collectionName = NULL, $key = NULL, $data = NULL) {
        $retorno = FALSE;
        try {
            $data[ COL_FLAG_ACTIVO ] = FALSE;
            $retorno = $this->merge($collectionName, $key, $data);
        } catch (Exception $e) {
        }
        return $retorno;
    }

    /**
     * Borra un documento de manera definitiva.
     * @param null $collectionName
     * @param null $key
     * @return array|bool
     */
    public function destroy($collectionName = NULL, $key = NULL) {
        $retorno = FALSE;
        try {
            $collection = $this->manager->selectCollection(DB_DB, $collectionName);
            $retorno = $collection->remove($key);
        } catch (Exception $e) {
        }
        return $retorno;
    }

    /**
     * Hac un update el documento seleccionado
     * @param null $collectionName
     * @param null $key
     * @param null $data
     * @return bool
     */
    public function merge($collectionName = NULL, $key = NULL, $data = NULL) {
        $retorno = FALSE;
        try {
            $collection = $this->manager->selectCollection(DB_DB, $collectionName);
            unset($data[ COL_ID_DOCUMENT ]);
            $newData = array( '$set' => $data );
            $retorno = $collection->update($key, $newData);
        } catch (Exception $e) {
        }
        return $retorno;
    }

    /**
     * @param $collectionName
     * @return int|null
     */
    public function count($collectionName) {
        $retorno = NULL;
        try {
            $collection = $this->manager->selectCollection(DB_DB, $collectionName);
            $retorno = $collection->count();
        } catch (Exception $e) {
        }
        return $retorno;
    }

    public function close() {
        $this->manager->close();
    }

    /**
     * Crea una colección en la base de datos
     * @param $collectionName
     * @return bool|MongoCollection
     */
    public function persistCollection($collectionName) {
        $retorno = FALSE;
        try {
            $db = $this->manager->selectDB(DB_DB);
            $retorno = $db->createCollection($collectionName);
        } catch (Exception $e) {
        }
        return $retorno;
    }

    /**
     * Borra una colección en la base de datos
     * @param $collectionName
     * @return array|bool
     */
    public function removeCollection($collectionName) {
        $retorno = FALSE;
        try {
            $db = $this->manager->selectDB(DB_DB);
            $retorno = $db->dropCollection($collectionName);
        } catch (Exception $e) {
        }
        return $retorno;
    }
}
