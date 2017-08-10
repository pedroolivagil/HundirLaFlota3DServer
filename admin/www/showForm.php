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
if ($clase != NULL) {
    $obj = new $clase();
    ?>
    <h3>Crear un documento en: <strong><?php echo $clase; ?></strong></h3>
    <?php
    $obj->serialize();
    $vars = $obj->getVars();
    ?>
    <form id="formularioEntidad" name="formularioEntidad" onsubmit="return false;" method="post">
        <?php
        foreach ($vars as $key => $value) {
            if ($key == '_id' or $key == 'flag_active' or $key == 'add_date'
                or ($key != 'id_locale' and (stripos($key, "id_") === 0))
            ) {
                continue;
            }
            ?>
            <div class="field">
                <div class="card">
                    <div class="card-block">
                        <h6 class="card-title"><?php echo ucfirst(str_replace(-'_', ' ', $key)); ?></h6>
                        <input class="form-control" type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>">
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        <div class="text-center" style="clear: both; float: none; padding-top: 20px;">
            <button type="submit" class="btn btn-outline-primary">Save</button>
            &nbsp;
            <button type="reset" class="btn btn-outline-danger">Cancel</button>
        </div>
    </form>
    <?php
}