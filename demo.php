<?php

require_once('config.php');
header('Content-type: application/json; charset=utf-8');
//$database = 'hundirlaflota3d';
//$uri = "mongodb://userhundirlaflota3d:1ATN1pgkujiA8lW@ds123662.mlab.com:23662/hundirlaflota3d";
//try {
////    $manager = new MongoDB\Driver\Manager($uri);
//    $manager = new MongoClient($uri);
//    $usuarios = $manager->selectCollection($database, "usuarios");
//
//    $cursor = $usuarios->find(['flag_activo' => TRUE]);
//    foreach ($cursor as $document) {
//        print_r($document);
//    }
//    echo '--------------------------------------------------------------------';
////    $newuser = array(
////        'id_user' => 4,
////        'username' => 'erger',
////        'pass' => '1234567890',
////        'email' => 'onion_oliva@hotmail.com'
////    );
////    $usuarios->insert($newuser);
//    echo '--------------------------------------------------------------------';
//    $cursor = $usuarios->find();
//    foreach ($cursor as $document) {
//        print_r($document);
//    }
//} catch (Exception $e) {
//    print_r($e->getMessage());
//}
//$cursor_users = DB::getInstance()->find('usuarios');
//foreach ($cursor_users as $document) {
//    print_r($document);
//}

$user = (new UserController())->findById(1);
print_r($user);
