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
    if ($gestor = opendir('../models/game')) {
        while (FALSE !== ($entrada = readdir($gestor))) {
            if ($entrada != "." and $entrada != "..") {
                if (is_file('../models/game/' . $entrada)) {
                    $class = (str_replace('.php', '', $entrada));
                    array_push($listEntity, $class);
                }
            }
        }
        closedir($gestor);
    }
    return $listEntity;
}

$user = Tools::getSession();
?>
<!doctype html>
<html>
<head>
    <title>Crear entidad</title>
    <?php Tools::importBootstrap(); ?>
    <style>
        .color-white {
            color: #999;
        }

        .color-white:hover {
            color: #FFF;
        }
        
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
    <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse bg-faded">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarText" aria-controls="navbarText" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Admin APP</a>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
            </ul>
            <span class="navbar-text">Welcome, <?php echo ucfirst($user->getUsername()); ?></span>
            <span class="navbar-text">&nbsp;&nbsp;&nbsp;&nbsp;|</span>
            <a class="nav-link navbar-text color-white" href="#">Cerrar sesión</a>
        </div>
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
