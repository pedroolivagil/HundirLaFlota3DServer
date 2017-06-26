<?php

include_once('ScriptDB.php');
header('Content-type: text/plain; charset=utf-8');

$script = new ScriptDB();
// Iniciamos los controladores
$userManager = new UserController();
$idiomaManager = new IdiomaController();
$shipManager = new ShipController();

// Datos
$fileUsers = file("users.db", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$fileIdioma = file("idioma.db", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$fileShips = file("ships.db", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Insertamos los datos a la BBDD
echo "\nUsuarios";
foreach ($fileUsers as $num_línea => $linea) {
    $obj = new User(json_decode($linea, TRUE));
    if ($userManager->create($obj)) {
        echo "\n\tInsertado\t" . $obj->getUsername();
    } else {
        echo "\n\tNO insertado\t" . $obj->getUsername();
    }
}
echo "\n--------------------------------------------------------------------";

echo "\nIdiomas";
foreach ($fileIdioma as $num_línea => $linea) {
    $obj = new Idioma(json_decode($linea, TRUE));
    if ($idiomaManager->create($obj)) {
        echo "\n\tInsertado\t" . $obj->getCodigoISO();
    } else {
        echo "\n\tNO insertado\t" . $obj->getCodigoISO();
    }
}
echo "\n--------------------------------------------------------------------";
