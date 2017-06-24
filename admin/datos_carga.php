<?php

include_once('ScriptDB.php');
header('Content-type: text/plain; charset=utf-8');

$script = new ScriptDB();
// Iniciamos los controladores
$userManager = new UserController();

// Datos
$fileUsers = file("users.db", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Insertamos los datos a la BBDD
echo "\nUsuarios";
foreach ($fileUsers as $num_línea => $linea) {
    $user = new User(json_decode($linea, TRUE));
    if ($userManager->create($user)) {
        echo "\n\tInsertado\t" . $user->getUsername();
    } else {
        echo "\n\tNO insertado\t" . $user->getUsername();
    }
}
echo "\n--------------------------------------------------------------------";
