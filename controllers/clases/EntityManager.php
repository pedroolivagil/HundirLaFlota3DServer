<?php
/**
 * Maneja la base de datos y lanza sus métodos
 *
 * @author Oliva
 */
class EntityManager implements BasicMethods {
    
    private $db;
    
    public function __construct() {
        $db = DB::getInstance()->getManager();
    }

    //put your code here
    public function create() {
        
    }

    public function delete() {
        
    }

    public function find() {
        
    }

    public function findByKey($key) {
        
    }

    public function update() {
        
    }

}
