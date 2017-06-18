<?php
/**
 * Basic methods for entities
 * @author Oliva
 */
interface BasicMethods {
    function find();
    function findByKey($key);
    function create();
    function update();
    function delete();
}
