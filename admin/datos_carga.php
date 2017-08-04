<?php
include_once('../config.php');
include_once('ScriptDB.php');
Tools::login(1, TRUE);
//header('Content-type: application/json; charset=utf-8');
$script = new ScriptDB();
// Iniciamos los controladores
$userManager = new UserController();
$idiomaManager = new LocaleController();
$powerupManager = new PowerUpController();
// Datos
$fileUsers = file("db/user.db", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$fileIdioma = file("db/locale.db", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$filePowerup = file("db/powerup.db", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$fileShips = file("db/vessel.db", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
// Insertamos los datos a la BBDD
echo "\nUsuarios\n\n";
foreach ($fileUsers as $num_linea => $linea) {
    $obj = new User(json_decode($linea, TRUE));
    if ($userManager->create($obj)) {
        echo "\n\tInsertado\t" . $obj->getUsername();
    } else {
        echo "\n\tNO insertado\t" . $obj->getUsername();
    }
}
echo "\n--------------------------------------------------------------------";
echo "\nIdiomas\n\n";
foreach ($fileIdioma as $num_linea => $linea) {
    $obj = new LocaleApp(json_decode($linea, TRUE));
    if ($idiomaManager->create($obj)) {
        echo "\n\tInsertado\t" . $obj->getCodeISO();
    } else {
        echo "\n\tNO insertado\t" . $obj->getCodeISO();
    }
}
echo "\n--------------------------------------------------------------------";
echo "\nPower UPs\n\n";
foreach ($filePowerup as $num_linea => $linea) {
    $obj = new PowerUp(json_decode($linea, TRUE));
    if ($powerupManager->create($obj)) {
        echo "\n\tInsertado\t" . $obj->getCode();
    } else {
        echo "\n\tNO insertado\t" . $obj->getCode();
    }
}
echo "\n--------------------------------------------------------------------";
