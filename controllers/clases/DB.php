<?php

/**
 * Maneja las conexiones y ejecuta las operaciones en la BBDD
 *
 * @author Oliva
 */
class DB implements DBMethods {

    private static $instance;
    private $manager;

    public static function getInstance() {
        if (Tools::isNull(self::$instance)) {
            self::$instance = new DB();
        }
        return self::$instance;
    }

    public function getManager() {
        return $this->manager;
    }

    private function __construct() {
        $uri = "mongodb://" . DB_USER . ":" . DB_PASSWORD . "@" . DB_HOST . ":" . DB_PORT . "/" . DB_DB;
        $this->manager = new MongoClient($uri);
    }

    /**
     * Crea un documento en la colección
     * @param type string $collection Nombre de la colección
     * @param type array $data Array de datos para insertar
     * @return boolean
     */
    public function persist($collectionName = NULL, &$data = NULL) {
        try {
            if (Tools::isNull($collectionName) or Tools::isNull($data)) {
                return FALSE;
            }
            $collection = $this->manager->selectCollection(DB_DB, $collectionName);
            return $collection->insert($data);
        } catch (Exception $e) {
            return FALSE;
        }
    }

    /**
     * Borra un documento de manera superficial. Solo desactiva el documento con un bool
     * @param type string $collection Nombre de la colección
     * @param type array $key Array [key_id => value] para el borrado
     * @return boolean
     */
    public function remove($collectionName = NULL, &$key = NULL) {
        try {
            if (Tools::isNull($collectionName) or Tools::isNull($key)) {
                return FALSE;
            }
            $collection = $this->manager->selectCollection(DB_DB, $collectionName);
            $flagFalse = array('$set' => array(FLAG_ACTIVO => FALSE));
            return $collection->update($key, $flagFalse);
        } catch (Exception $e) {
            return FALSE;
        }
    }

    /**
     * 
     * @param type string $collectionName Nombre de la colección
     * @return type integer Total de documentos en una colección
     */
    public function count($collectionName) {
        try {
            $collection = $this->manager->selectCollection(DB_DB, $collectionName);
            return $collection->count();
        } catch (Exception $e) {
            return NULL;
        }
    }

    /**
     * 
     * @param type string $collectionName Nombre de la colección
     * @return type array()
     */
    public function find($collectionName) {
        try {
            $collection = $this->manager->selectCollection(DB_DB, $collectionName);
            return $collection->find();
        } catch (Exception $e) {
            return NULL;
        }
    }

    /**
     * 
     * @param type string $collectionName $collection Nombre de la colección
     * @param type array $key  Array [key_id => value]
     * @return type
     */
    public function findByKey($collectionName, $key) {
        try {
            $collection = $this->manager->selectCollection(DB_DB, $collectionName);
            return $collection->find($key);
        } catch (Exception $e) {
            return NULL;
        }
    }

    /**
     * Hac un update el documento seleccionado
     * @param type $collection Nombre de la colección
     * @param type array $key Array [key_id => value] para el borrado
     * @param type array $newData Array con los nuevos datos
     * @return boolean
     */
    public function merge($collectionName = NULL, &$key = NULL, $newData = NULL) {
        try {
            if (Tools::isNull($collectionName) or Tools::isNull($key) or Tools::isNull($newDate)) {
                return FALSE;
            }
            $collection = $this->manager->selectCollection(DB_DB, $collectionName);
            $flagFalse = array('$set' => $newData);
            return $collection->update($key, $flagFalse);
        } catch (Exception $e) {
            return FALSE;
        }
    }

    public function close() {
        $this->manager->close();
    }

}
