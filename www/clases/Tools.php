<?php
/**
 * Description of Tools
 *
 * @author Oliva
 */
abstract class Tools {
    
    public static function scapeString($string) {
        return mysqli_real_escape_string(trim($string));
    }
    
    public static function encrypt($string) {
        return md5(CRYPT_KEY . '' . $string);
    }

    public static function cryptpass($str) {
        // encripta un string con codificación blowfish
        if (CRYPT_BLOWFISH == 1) {
            return crypt($str, '$2a$07$HunDiRLaFlOtA3D52570b6fcf2eb$');
        }
    }
    
    public static function cleanChars($string) {
        $char = array(',', '.', ';', ':', '-', '/', '+', '-', '*', '<', '>', 'Âº', 'Âª', '\\', '&', '!', '"', 'Â·', '$', '%', '(', ')', '=', '\'', '?', 'Â¡', 'Â¿', '|', '@', '#', '~', 'â‚¬', 'Â¬', '{', '}', '[', ']', 'Ã§', '`', 'Â´');
        $char_rpl = '';
        return trim(str_replace($char, $char_rpl, $string));
    }

    public static function crearIdUnico($leng) {
        return substr(md5(microtime()), 0, $leng);
    }

    public static function generateUUID($leng) {
        return substr(str_replace("-", "", UUID::generate(UUID::UUID_RANDOM, UUID::FMT_STRING)), 0, $leng);
    }
}
