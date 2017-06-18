<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EntitySerialize
 *
 * @author Oliva
 */
class _EntitySerialize implements Serializable {

    public function __construct() {
        //obtengo un array con los parámetros enviados a la función
        $params = func_get_args();
        //saco el número de parámetros que estoy recibiendo
        $num_params = func_num_args();
        //cada constructor de un número dado de parámtros tendrá un nombre de función
        $funcion_constructor = '__construct' . $num_params;
        if (method_exists($this, $funcion_constructor)) {
            call_user_func_array(array($this, $funcion_constructor), $params);
        } else {
            __construct0();
        }
    }

    public function __construct0() {
        
    }

    public function __construct1($arrayValues) {
        
    }

    public function serialize() {
        return json_encode(get_object_vars($this), JSON_HEX_AMP | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE);
    }

    public function unserialize($serialized) {
        throw new Exception("Method not implemented");
    }

}
