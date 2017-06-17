<?php
echo 'Hola';

$usuario = 'userhundirlaflota3d';
$password = '1ATN1pgkujiA8lW';
$database = 'hundirlaflota3d';
$uri = "mongodb://$usuario:$password@ds123662.mlab.com:23662/$database";
//$db = new MongoDB\Driver\Manager($uri);
phpinfo();
//var_dump($db->getConnections());