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
        $ips = array(IP_UPKEEP);
        if ($bool) {
            if (!array_search(Tools::getRealIP(), $ips)) {
                //header('Location: mantenimiento');
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

    public static function newLog($to_user, $to_table, $action, $state = NULL, $old_value = NULL, $new_value = NULL, $author_cause = NULL) {
        $user = self::getSession();
        if ($user != NULL) {
            $userLog = new UserLog();
            $userLog->setAuthor($user->getIdUser());
            $userLog->setAction($action);
            $userLog->setAuthorCause($author_cause);
            $userLog->setAuthorIp(self::getRealIP());
            $userLog->setAuthorRange($user->getTypeUser());
            $userLog->setLogDate(time());
            $userLog->setNewValue($new_value);
            $userLog->setOldValue($old_value);
            $userLog->setToTable($to_table);
            $userLog->setToUser($to_user);
            $userLog->setState($state);
            $file = fopen(_LOGS_PATH_ . TABLE_USER_LOG . EXTENSION_LOG, "a");
            fwrite($file, $userLog->serialize() . PHP_EOL);
            fclose($file);
        }
    }

    public static function serialize($value) {
        try {
            return json_encode($value, JSON_HEX_AMP | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE);
        } catch (Exception $e) {
            return $value;
        }
    }

    public static function formatDate($time, $pattern = 'd-m-Y H:i:s') {
        return date($pattern, $time);
    }

    public static function readPrintLog() {
        $listLogs = array();
        $url = _LOGS_PATH_ . TABLE_USER_LOG . EXTENSION_LOG;
        chmod($url, 0777);
        $file = fopen($url, "r") or exit("Error de lectura del log: '" . TABLE_USER_LOG . "'");
        //Output a line of the file until the end is reached
        while (!feof($file)) {
            array_push($listLogs, new UserLog(json_decode(fgets($file), TRUE)));
        }
        fclose($file);
        chmod($url, 0755);
        return $listLogs;
    }

    public static function getContentOfFile($url, $params = false, $values = false) {
        $txt = "";
        chmod($url, 0777);
        $file = fopen($url, "r") or exit("Error de lectura de 'Header'");
        //Output a line of the file until the end is reached
        while (!feof($file)) {
            if ($params && $values) {
                $txt .= str_replace($params, $values, fgets($file)) . "\n";
            } else {
                $txt .= fgets($file) . "\n";
            }
        }
        fclose($file);
        chmod($url, 0755);
        return $txt;
    }

}
