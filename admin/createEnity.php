<?php
/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: createEnity.php
 * Date: 09/08/2017 19:06
 */
include_once('../config.php');
function getEntities() {
    $listEntity = array();
    if ($gestor = opendir('../models')) {
        while (FALSE !== ($entrada = readdir($gestor))) {
            if ($entrada != "." and $entrada != ".." and $entrada != "_EntitySerialize.php" and $entrada != "GenericTrans.php") {
                if (is_file('../models/' . $entrada)) {
                    $class = (str_replace('.php', '', $entrada));
                    array_push($listEntity, $class);
                }
            }
        }
        closedir($gestor);
    }
    if ($gestor = opendir('../models/scenario')) {
        while (FALSE !== ($entrada = readdir($gestor))) {
            if ($entrada != "." and $entrada != "..") {
                if (is_file('../models/scenario/' . $entrada)) {
                    $class = (str_replace('.php', '', $entrada));
                    array_push($listEntity, $class);
                }
            }
        }
        closedir($gestor);
    }
    return $listEntity;
}

?>
<!doctype html>
<html>
<head>
    <title>Crear entidad</title>
    <meta charset="UTF-8"/>
    <?php Tools::importBootstrap(); ?>
    <!--<style>-->
    <!--    .container, .container * {-->
    <!--        outline: 1px solid #F00;-->
    <!--    }-->
    <!--</style>-->
    <script src="js/functions.js"></script>
</head>
<body>
<div class="container">
    <br/>
    <form>
        <select id="entities" name="entities" class="form-control" onchange="loadClassOptions()">
            <option value="null">-- Selecciona una entidad --</option>
            <?php foreach (getEntities() as $entity) { ?>
                <option value="<?php echo $entity; ?>"><?php echo $entity; ?></option>
            <?php } ?>
        </select>
    </form>
    <br/>
    <div class="well" id="response"></div>
</div>
</body>
</html>
