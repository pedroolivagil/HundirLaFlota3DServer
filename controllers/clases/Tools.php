<?php

class Tools {

    public static function isNull($obj) {
        return is_null($ojb) or empty($obj);
    }

    public static function isNotNull($obj) {
        return self::isNull($obj);
    }

    public static function getRealIP() {
        if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            return $_SERVER["HTTP_CLIENT_IP"];
        } elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            return $_SERVER["HTTP_X_FORWARDED_FOR"];
        } elseif (isset($_SERVER["HTTP_X_FORWARDED"])) {
            return $_SERVER["HTTP_X_FORWARDED"];
        } elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])) {
            return $_SERVER["HTTP_FORWARDED_FOR"];
        } elseif (isset($_SERVER["HTTP_FORWARDED"])) {
            return $_SERVER["HTTP_FORWARDED"];
        } else {
            return $_SERVER["REMOTE_ADDR"];
        }
    }

    /**
     * Poner la página en mantenimiento menos a las IPs permitidas
     * @param type $bool
     */
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

    /**
     * cierra sesión
     */
    public static function logout() {
        unset($_SESSION[SESSION_USUARIO]);
        self::setCookie(SESSION_AUTOLOGIN, FALSE);
        self::setCookie(SESSION_USUARIO_ID, NULL);
    }

    /**
     * 
     * @return \Userdevuelve el usuario de la sesión
     */
    public static function getSession() {
        $user = new User(json_decode($_SESSION[SESSION_USUARIO], TRUE));
        return $user;
    }

    /**
     * Crea un nuevo Log de usuario
     * @param type $to_user
     * @param type $to_table
     * @param type $action
     * @param type $state
     * @param type $old_value
     * @param type $new_value
     * @param type $author_cause
     */
    public static function newLog($to_user, $to_table, $action, $state = NULL, $old_value = NULL, $new_value = NULL, $author_cause = NULL) {
        if (LOG_ACTIVE) {
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
    }

    /**
     * Serializa un array 
     * @param type $value
     * @return type
     */
    public static function serialize($value) {
        try {
            if (!is_null($value)) {
                return json_encode($value, JSON_HEX_AMP | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE);
            } else {
                return '---';
            }
        } catch (Exception $e) {
            return $value;
        }
    }

    /**
     * Transforma un time() a una fecha con un patron específico
     * @param type $time
     * @param type $pattern
     * @return type
     */
    public static function formatDate($time, $pattern = 'd-m-Y H:i:s') {
        return date($pattern, $time);
    }

    /**
     * Muestra  de forma atractiva una cifra de bytes a la catidad adecuada, mb, gb,...
     * @param type $url
     * @param type $decimals
     * @return type
     */
    public static function human_filesize($url, $decimals = 2) {
        $bytes = filesize($url);
        $sz = 'BKMGTP';
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
    }

    /**
     * Convierte Bytes a Megas
     * @param type $bytes
     * @return type
     */
    public static function bytesToMegas($bytes) {
        return $bytes / 1024 / 1024;
    }

    /**
     * Devuelve la lista con los logs convertidos a objeto
     * @return array
     */
    public static function readPrintLog() {
        $listLogs = array();
        $url = _LOGS_PATH_ . TABLE_USER_LOG . EXTENSION_LOG;
        if (file_exists($url)) {
            chmod($url, 0777);
            $file = fopen($url, "r") or exit("Error de lectura del log: '" . TABLE_USER_LOG . "'");
            //Output a line of the file until the end is reached
            while (($linea = fgets($file, 4096)) !== false) {
                $array = json_decode($linea, TRUE);
                array_push($listLogs, new UserLog($array));
            }
            if (!feof($file)) {
                exit("Error de lectura del log: '" . TABLE_USER_LOG . "'");
            }
            fclose($file);
            chmod($url, 0755);
        }
        return $listLogs;
    }

    /**
     * Convierte un fichero a un string reemplazando los parámetros específicos
     * @param type $url
     * @param type $params
     * @param type $values
     * @return string
     */
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
