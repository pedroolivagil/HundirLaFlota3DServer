<?php

require_once('config.php');
//header('Content-type: application/json; charset=utf-8');
//
//$manger = new IdiomaController();
////{ "id_idioma" : 1, "codigo_iso" : "ES", "flag_activo" : true, "fecha_alta" : 1498325106, "id_trans" : 1}
//$es_trans = array(
//    array(
//        'texto' => 'Español',
//        'id_idioma' => 1
//    ),
//    array(
//        'texto' => 'Spanish',
//        'id_idioma' => 2
//    )
//);
//$es = new Idioma(array(
//    'codigo_iso' => 'ES',
//    'trans' => $es_trans
//        ));
////var_dump($es);
//if ($manger->create($es)) {
//    echo '<br />ES OK!';
//} else {
//    echo '<br />ES Fail!';
//}
////{ "id_idioma" : 2, "codigo_iso" : "EN", "flag_activo" : true, "fecha_alta" : 1498325106, "id_trans" : 2}
//$en_trans = array(
//    array(
//        'texto' => 'Inglés',
//        'id_idioma' => 1
//    ),
//    array(
//        'texto' => 'English',
//        'id_idioma' => 2
//    )
//);
//$en = new Idioma(array(
//    'codigo_iso' => 'EN',
//    'trans' => $en_trans
//        ));
////var_dump($en);
//if ($manger->create($en)) {
//    echo '<br />EN OK!';
//} else {
//    echo '<br />EN Fail!';
//}
//echo "<br /><br />--------------------------------------------------------------------<br />";
//$Mgr = new Controller();
//$ = $Mgr->findById(1);
//print_r($);

echo "<br /><br />--------------------------------------------------------------------<br />";
$localeMgr = new LocaleController();
$locale = $localeMgr->findById(1);
var_dump($locale);

echo "<br /><br />--------------------------------------------------------------------<br />";
$userMgr = new UserController();
$user = $userMgr->findById(1);
var_dump($user);
