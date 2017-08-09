<?php

/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: DBMethods.php
 * Date: 09/08/2017 02:48
 */
interface DBMethods {

    /**
     *
     * @param type string $collectionName Nombre de la colección
     * @return type array()
     */
    function find($collectionName);

    /**
     *
     * @param type string $collectionName $collection Nombre de la colección
     * @param type array $key  Array [key_id => value]
     * @return type
     */
    function findByKey($collectionName, $key);

    /**
     * Crea un documento en la colección
     * @param type string $collection Nombre de la colección
     * @param type array $data Array de datos para insertar
     * @return boolean
     */
    function persist($collectionName = NULL, $data = NULL);

    /**
     * Borra un documento de manera superficial. Solo desactiva el documento con un bool
     * @param type string $collection Nombre de la colección
     * @param type array $key Array [key_id => value] para el borrado
     * @return boolean
     */
    function remove($collectionName = NULL, $key = NULL, $data = NULL);

    /**
     * Hac un update el documento seleccionado
     * @param type $collection Nombre de la colección
     * @param type array $key Array [key_id => value] para el borrado
     * @param type array $newData Array con los nuevos datos
     * @return boolean
     */
    function merge($collectionName = NULL, $key = NULL, $data = NULL);
}
