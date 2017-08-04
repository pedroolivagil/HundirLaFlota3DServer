<?php

/**
 * Description of EntitySerialize
 *
 * @author Oliva
 */
class _EntitySerialize implements Serializable {

    private $object;

    public function __construct() {
        //obtengo un array con los parámetros enviados a la función
        $params = func_get_args();
        //saco el número de parámetros que estoy recibiendo
        $num_params = func_num_args();
        //cada constructor de un número dado de parámtros tendrá un nombre de función
        $funcion_constructor = '__construct' . $num_params;
        if (method_exists($this, $funcion_constructor)) {
            call_user_func_array(array( $this, $funcion_constructor ), $params);
        } else {
            __construct0();
        }
    }

    public function __construct0() {
    }

    public function __construct1($arrayValues) {
    }

    protected function setObject($object) {
        $this->object = $object;
    }

    public function serialize() {
        try {
            return json_encode($this->object, JSON_HEX_AMP | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE);
        } catch (Exception $e) {
            throw new Exception($e . ': ' . json_last_error_msg());
        }
    }

    public function unserialize($serialized) {
        return json_decode($serialized, TRUE);
    }
}
