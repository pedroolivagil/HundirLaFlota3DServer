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
    <form>
        <?php
        foreach ($vars as $key => $value) {
            if ($key == '_id' or $key == 'flag_active' or $key == 'add_date'
                or ($key != 'id_locale' and (stripos($key, "id_") === 0))
            ) {
                continue;
            }
            ?>
            <div class="field">
                <div class="form-group row well">
                    <label for="example-text-input" class="col-2 col-form-label"><?php echo $key; ?></label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>">
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </form>

    <?php
}