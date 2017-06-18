<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Oliva
 */
interface DBMethods {
    /**
     * Crea un documento en la colección
     * @param type string $collection Nombre de la colección
     * @param type array $data Array de datos para insertar
     * @return boolean
     */
    function persist($collectionName = NULL, &$data = NULL);

    /**
     * Borra un documento de manera superficial. Solo desactiva el documento con un bool
     * @param type string $collection Nombre de la colección
     * @param type array $key Array [key_id => value] para el borrado
     * @return boolean
     */
    function remove($collectionName = NULL, &$key = NULL);

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
     * Hac un update el documento seleccionado
     * @param type $collection Nombre de la colección
     * @param type array $key Array [key_id => value] para el borrado
     * @param type array $newData Array con los nuevos datos
     * @return boolean
     */
    function merge($collectionName = NULL, &$key = NULL, $newData = NULL);
}
