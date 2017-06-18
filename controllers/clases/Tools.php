<?php

class Tools {
    public static function isNull($obj){
        return is_null($ojb) or empty($obj);
    }
    
    public static function isNotNull($obj){
        return !self::isNull($obj);
    }
}
