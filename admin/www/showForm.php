<?php
/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: showForm.php
 * Date: 09/08/2017 19:58
 */
include_once('../../config.php');
$clase = $_REQUEST[ 'clase' ];
$obj = new $clase();
// $obj = new User();
?>
    <h3>Crear un documento en: <strong><?php echo $clase; ?></strong></h3>
<?php
$obj->serialize();
var_dump($obj->getVars());
