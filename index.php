<?php
/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: index.php
 * Date: 09/08/2017 02:48
 */
$usuario = 'userhundirlaflota3d';
$password = '1ATN1pgkujiA8lW';
$database = 'hundirlaflota3d';
$uri = "mongodb://$usuario:$password@ds123662.mlab.com:23662/$database";
//$db = new MongoDB\Driver\Manager($uri);
print base64_encode(hash("sha256", mb_convert_encoding("wedñughn3wer4ggtt0983434thjn3q4orttgg3·%T·e3f32443wefawsfwe", "UTF-16LE"), TRUE));
//var_dump($db->getConnections());