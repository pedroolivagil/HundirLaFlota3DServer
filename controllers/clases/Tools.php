<?php

/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: Tools.php
 * Date: 09/08/2017 02:48
 */
class Tools {

    public static function isNull($obj) {
        $retorno = FALSE;
        if (is_null($obj)) {
            $retorno = TRUE;
        } else if (!is_null($obj) and is_array($obj) and empty($obj)) {
            $retorno = TRUE;
        } else if (!is_null($obj) and !is_array($obj) and trim($obj) == '') {
            $retorno = TRUE;
        } else if (!is_null($obj) and !is_array($obj) and trim($obj) == '') {
            $retorno = TRUE;
        }
        return $retorno;
        // return is_null($obj) or empty($obj) or trim($obj) == '';
    }

    public static function isNotNull($obj) { return !(self::isNull($obj)); }

    public static function getRealIP() {
        if (isset($_SERVER[ "HTTP_CLIENT_IP" ])) {
            return $_SERVER[ "HTTP_CLIENT_IP" ];
        } elseif (isset($_SERVER[ "HTTP_X_FORWARDED_FOR" ])) {
            return $_SERVER[ "HTTP_X_FORWARDED_FOR" ];
        } elseif (isset($_SERVER[ "HTTP_X_FORWARDED" ])) {
            return $_SERVER[ "HTTP_X_FORWARDED" ];
        } elseif (isset($_SERVER[ "HTTP_FORWARDED_FOR" ])) {
            return $_SERVER[ "HTTP_FORWARDED_FOR" ];
        } elseif (isset($_SERVER[ "HTTP_FORWARDED" ])) {
            return $_SERVER[ "HTTP_FORWARDED" ];
        } else {
            return $_SERVER[ "REMOTE_ADDR" ];
        }
    }

    /**
     * Poner la página en mantenimiento menos a las IPs permitidas
     * @param type $bool
     */
    public static function isUpkeep($bool) {
        // si bool es True, la pagina se queda en mantenimiento y solo visible para las ip disponibles
        $ips = array( IP_UPKEEP );
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

    public static function getCookie($id) { return $_COOKIE[ $id ]; }

    public static function login($idUser = NULL, $autologin = FALSE) {
        if (self::getCookie(SESSION_AUTOLOGIN)) {
            self::autoLogin();
        } else {
            if ($idUser != NULL) {
                $mngr = new UserController();
                $user = $mngr->findById($idUser);
                if ($user) {
                    $_SESSION[ SESSION_USUARIO ] = $user->serialize();
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
            $_SESSION[ SESSION_USUARIO ] = $user->serialize();
        }
    }

    /**
     * cierra sesión
     */
    public static function logout() {
        unset($_SESSION[ SESSION_USUARIO ]);
        self::setCookie(SESSION_AUTOLOGIN, FALSE);
        self::setCookie(SESSION_USUARIO_ID, NULL);
    }

    /**
     *
     * @return \Userdevuelve el usuario de la sesión
     */
    public static function getSession() {
        $user = new User(json_decode($_SESSION[ SESSION_USUARIO ], TRUE));
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

    public static function newImgLog($id, $nameImg, $sizeImg, $mime, $encodeImg) {
        $resource = new Resource();
        $resource->setIdResource($id);
        $resource->setName($nameImg);
        $resource->setSize($sizeImg);
        $resource->setMimetype($mime);
        $resource->setFile($encodeImg);
        $file = fopen(_LOGS_PATH_ . TABLE_IMG_LOG . EXTENSION_LOG, "a");
        fwrite($file, $resource->serialize() . PHP_EOL);
        fclose($file);
    }

    /**
     * Serializa un array
     * @param type $value
     * @return string
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
     * @param $time
     * @param string $pattern
     * @return false|string
     */
    public static function formatDate($time, $pattern = 'd-m-Y H:i:s') { return date($pattern, $time); }

    /**
     * Muestra  de forma atractiva una cifra de bytes a la catidad adecuada, mb, gb,...
     * @param $url
     * @param int $decimals
     * @return string
     */
    public static function human_filesize($url, $decimals = 2) {
        $bytes = filesize($url);
        $sz = 'BKMGTP';
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[ $factor ];
    }

    /**
     * Convierte Bytes a Megas
     * @param $bytes
     * @return float
     */
    public static function bytesToMegas($bytes) { return $bytes / 1024 / 1024; }

    public static function bytesToMegasCool($bytes, $decimals = 2) {
        $sz = 'BKMGTP';
        $factor = floor((strlen($bytes) - 1) / 3);
        echo $factor;
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . $sz[ $factor ];
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
            while (($linea = fgets($file, 4096)) !== FALSE) {
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
     * @param $url
     * @param bool $params
     * @param bool $values
     * @return string
     */
    public static function getContentOfFile($url, $params = FALSE, $values = FALSE) {
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

    public static function encode64($url) {
        $data = file_get_contents($url);
        return base64_encode($data);
    }

    public static function decode64($obj64) { return base64_decode($obj64, TRUE); }

    public static function createDir($url) {
        if (is_dir($url)) {
            chmod($url, 0744);
        } else {
            mkdir($url, 0744);
        }
        return TRUE;
    }

    public static function createImg($img, $ruta2, $tipo, $tam) {
        $retorno = FALSE;
        $original = FALSE;
        switch ($tipo) {
            case 'jpg':
            case 'jpeg':
                $original = imagecreatefromjpeg($ruta2 . $img);
                break;
            case 'gif':
                $original = imagecreatefromgif($ruta2 . $img);
                break;
            case 'png':
                $original = imagecreatefrompng($ruta2 . $img);
                break;
        }
        if ($original) {
            $numero = $tam;
            $ancho = imagesx($original);
            $alto = imagesy($original);
            if ($alto >= $ancho) {
                $proporcion = $ancho / $alto;
                $thumbalto = $numero;
                $thumbancho = ceil($numero * $proporcion);
            } else {
                //Mas ancho q largo
                $proporcion = $alto / $ancho;
                $thumbancho = $numero;
                $thumbalto = ceil($numero * $proporcion);
            }
            $rutathumb = $ruta2 . '/thumb';
            self::createDir($rutathumb);
            $thumb = imagecreatetruecolor($thumbancho, $thumbalto);
            imagealphablending($thumb, FALSE);
            $tranparente = imagecolorallocatealpha($thumb, 0, 0, 0, 0);
            imagefilledrectangle($thumb, 0, 0, 0, 0, $tranparente);
            imagecopyresampled($thumb, $original, 0, 0, 0, 0, $thumbancho, $thumbalto, $ancho, $alto);
            imagesavealpha($thumb, TRUE);
            switch ($tipo) {
                case 'jpg':
                case 'jpeg':
                    $retorno = imagejpeg($thumb, $rutathumb . '/' . $img, 60);
                    break;
                case 'png':
                    $retorno = imagepng($thumb, $rutathumb . '/' . $img, 9);
                    break;
                case 'gif':
                    $retorno = imagegif($thumb, $rutathumb . '/' . $img);
                    break;
            }
        }
        return $retorno;
    }

    public static function importBootstrap() {
        echo '<meta charset="UTF-8"/>';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">';
        echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">';
    }

    public static function importScripts($url) {
        echo '<script  src="http://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>';
        echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>';
        echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>';
        echo '<script src="' . $url . 'js/functions.js"></script>';
    }

    public static function getController($obj) {
        $controller = NULL;
        if ($obj instanceof User) {
            $controller = new UserController();
        } else if ($obj instanceof Resource) {
            $controller = new ResourceController();
        } else if ($obj instanceof LocaleApp) {
            $controller = new LocaleAppController();
        } else if ($obj instanceof PowerUp) {
            $controller = new PowerUpController();
        } else if ($obj instanceof Scenario) {
            $controller = new ScenarioController();
            // } else if ($obj instanceof ) {
        } else {
            throw new Exception("No hay controlador definido para ese modelo", 0);
        }
        return $controller;
    }
}
