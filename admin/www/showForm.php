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
        <input type="hidden" value="<?php echo $clase; ?>" id="clase" name="clase"/>
        <?php
        foreach ($vars as $key => $value) {
            if ($key == '_id') {
                continue;
            }
            ?>
            <div class="field">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <?php if ($key == 'FlagActive') { ?>
                        <div class="input-group-addon"><?php echo $key; ?></div>
                        <div class="form-control text-left">
                            <div class="form-check" style="width: 100px;">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="<?php echo $key; ?>"
                                           id="<?php echo $key; ?>_on" value="TRUE" checked> True</label>
                            </div>
                            <div class="form-check" style="position:absolute; left: 120px; width: 100px;">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="<?php echo $key; ?>"
                                           id="<?php echo $key; ?>_off" value="FALSE"> False</label>
                            </div>
                        </div>
                    <?php } else if ($key == 'File') { ?>
                        <div class="input-group-addon"><?php echo $key; ?></div>

                        <div class="form-control text-left">
                            <button type="button" onsubmit="return false;" class="btn btn-primary btn-sm"
                                    onclick="clickElement('<?php echo $key; ?>')">Seleccionar archivo
                            </button>
                        </div>
                        <input class="form-control" style="display: none;" type="file" name="<?php echo $key; ?>"
                               id="<?php echo $key; ?>"/>
                    <?php } elseif ($key == 'Trans') { ?>
                        <div class="input-group-addon"><?php echo $key; ?></div>
                        <textarea class="form-control" type="text" name="<?php echo $key; ?>" style="height: 120px;"
                                  id="<?php echo $key; ?>"></textarea>
                    <?php } else { ?>
                        <div class="input-group-addon"><?php echo $key; ?></div>
                        <input class="form-control" type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>"/>
                    <?php } ?>
                </div>
            </div>
            <?php
        }
        ?>
        <div class="text-center" style="clear: both; float: none; padding-top: 20px;">
            <button type="submit" class="btn btn-outline-primary" onclick="newEntity()">Save</button>
            &nbsp;
            <button type="reset" class="btn btn-outline-danger" onclick="loadClassOptions()">Cancel</button>
        </div>
    </form>
    <?php
}