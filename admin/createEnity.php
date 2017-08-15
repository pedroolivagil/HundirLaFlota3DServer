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
    <?php Tools::importBootstrap(); ?>
    <style>
        .field {
            min-width: 49%;
            margin: 4px 4px;
            float: left;
        }

        .input-group-addon {
            min-width: 150px;
        }

        .form-check {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-inverse bg-inverse">
        <a class="navbar-brand" href="#">Admin</a>
        <span class="navbar-text">
            <?php echo Tools::getSession()->getUsername(); ?>
        </span>
    </nav>
    <div class="card text-center" style="width: 100%;">
        <div class="card-block">
            <form>
                <select id="entities" name="entities" class="form-control" onchange="loadClassOptions()">
                    <option value="">-- Selecciona una entidad --</option>
                    <?php foreach (getEntities() as $entity) { ?>
                        <option value="<?php echo $entity; ?>"><?php echo $entity; ?></option>
                    <?php } ?>
                </select>
            </form>
            <div id="response" class="mt-3"></div>
            <div id="responseNewEntity" class="mt-3"></div>
        </div>
    </div>
</div>
<?php Tools::importScripts(''); ?>
</body>
</html>
