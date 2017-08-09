<?php
/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: demo.php
 * Date: 09/08/2017 02:48
 */
require_once('config.php');
//header('Content-type: application/json; charset=utf-8');
$start_memory = memory_get_usage();
//$nombre_archivo = "mapa.jpg";
//if (Tools::createImg($nombre_archivo, _IMAGE_PATH_, "jpg", 2000)) {
//    $img = Tools::encode64(_IMAGE_PATH_ . "thumb/" . $nombre_archivo);
//    Tools::newImgLog(1, "mapa", filesize(_IMAGE_PATH_ . "thumb/" . $nombre_archivo), "image/jpeg", $img);
//}
print Tools::bytesToMegasCool(memory_get_usage() - $start_memory);
echo "<br /><br />--------------------------------------------------------------------<br />";
$start_memory = memory_get_usage();
$fileImg = file("logs/img_log.log", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
foreach ($fileImg as $num_linea => $linea) {
    $obj = new Resource(json_decode($linea, TRUE));
    echo '<img src="data:image/jpeg;base64,' . $obj->getFile() . '" width="100" />';
}
print Tools::bytesToMegasCool(memory_get_usage() - $start_memory);
?>
<?php
echo "<br /><br />--------------------------------------------------------------------<br />";
$localeMgr = new LocaleAppController();
$locale = $localeMgr->findById(1);
var_dump($locale);
echo "<br /><br />--------------------------------------------------------------------<br />";
$userMgr = new UserController();
$user = $userMgr->findById(1);
var_dump($user);
echo "<br /><br />--------------------------------------------------------------------<br />";
$powerMgr = new PowerUpController();
$powerup = $powerMgr->findById(1);
var_dump($powerup);

