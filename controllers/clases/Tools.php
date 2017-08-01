<?php

class Tools {

    public static function isNull($obj) {
        return is_null($ojb) or empty($obj);
    }

    public static function isNotNull($obj) {
        return !self::isNull($obj);
    }

    public static function getRealIP() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        }
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        return $_SERVER['REMOTE_ADDR'];
    }

    public static function isUpkeep($bool) {
        // si bool es True, la pagina se queda en mantenimiento y solo visible para las ip disponibles
        $ips = array('###.###.###.###', '###.###.###.###');
        if ($bool) {
            if (!array_search(Tools::getRealIP(), $ips)) {
                header('Location: mantenimiento');
                exit;
            }
        }
    }

    public static function cryptString($str) {
        // encripta un string con codificación blowfish
        if (CRYPT_BLOWFISH == 1) {
            return crypt($str, '$2a$07$HuNdiRFLoOLiloGicStuDIos52570b6fcf2eb$');
        }
    }

    public static function setCookie($id, $value) {
        setcookie($id, $value, EXPIRE, '/');
    }

    public static function getCookie($id) {
        return $_COOKIE[$id];
    }

    public static function login($idUser = null, $autologin = FALSE) {
        if (self::getCookie(SESSION_AUTOLOGIN)) {
            self::autoLogin();
        } else {
            if ($idUser != NULL) {
                $mngr = new UserController();
                $user = $mngr->findById($idUser);
                if ($user) {
                    $_SESSION[SESSION_USUARIO] = $user->serialize();
                    if ($autologin) {
                        self::setCookie(SESSION_AUTOLOGIN, TRUE);
                        self::setCookie(SESSION_USUARIO_ID, $idUser);
                    }
                }
            }
        }
    }

    public static function autoLogin() {
        if (self::getCookie(SESSION_AUTOLOGIN) === TRUE) {
            $mngr = new UserController();
            $user = $mngr->findById(self::getCookie(SESSION_USUARIO_ID));
            $_SESSION[SESSION_USUARIO] = $user->serialize();
        }
    }

    public static function logout() {
        unset($_SESSION[SESSION_USUARIO]);
        self::setCookie(SESSION_AUTOLOGIN, FALSE);
        self::setCookie(SESSION_USUARIO_ID, NULL);
    }

    public static function getSession() {
        $user = new User(json_decode($_SESSION[SESSION_USUARIO], TRUE));
        return $user;
    }

}
