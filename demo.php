<?php

require_once('config.php');
//header('Content-type: application/json; charset=utf-8');
//
//$manager = new ShipController();
//
//$ships = array(
//    new Ship(array(
//        'code' => 'explorador',
//        'health' => '1',
//        'size' => '1',
//        'trans' => array(
//            new ShipTrans(array(
//                'texto' => 'Explorador',
//                'id_idioma' => '1'
//                    )),
//            new ShipTrans(array(
//                'texto' => 'Explorer',
//                'id_idioma' => '2'
//                    ))
//        )
//            )),
//    new Ship(array(
//        'code' => 'fragata',
//        'health' => '2',
//        'size' => '2',
//        'trans' => array(
//            new ShipTrans(array(
//                'texto' => 'Fragata',
//                'id_idioma' => '1'
//                    )),
//            new ShipTrans(array(
//                'texto' => 'Frigate',
//                'id_idioma' => '2'
//                    ))
//        )
//            )),
//    new Ship(array(
//        'code' => 'bergantin',
//        'health' => '3',
//        'size' => '3',
//        'trans' => array(
//            new ShipTrans(array(
//                'texto' => 'Bergantín',
//                'id_idioma' => '1'
//                    )),
//            new ShipTrans(array(
//                'texto' => 'Brigantine',
//                'id_idioma' => '2'
//                    ))
//        )
//            )),
//    new Ship(array(
//        'code' => 'galeon',
//        'health' => '4',
//        'size' => '4',
//        'trans' => array(
//            new ShipTrans(array(
//                'texto' => 'Galeón',
//                'id_idioma' => '1'
//                    )),
//            new ShipTrans(array(
//                'texto' => 'Galleon',
//                'id_idioma' => '2'
//                    ))
//        )
//            )),
//    new Ship(array(
//        'code' => 'naval',
//        'health' => '5',
//        'size' => '5',
//        'trans' => array(
//            new ShipTrans(array(
//                'texto' => 'Buque de guerra',
//                'id_idioma' => '1'
//                    )),
//            new ShipTrans(array(
//                'texto' => 'Warship',
//                'id_idioma' => '2'
//                    ))
//        )
//            ))
//);

//$manager->create($data);

$userController = new UserController();

$user = $userController->findById(2);
var_dump($user);
