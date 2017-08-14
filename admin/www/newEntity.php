<?php
/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: newEntity.php
 * Date: 10/08/2017 03:22
 */
include_once('../../config.php');
sleep(.5);
$obj = NULL;
$form = $_REQUEST;
$clase = $form[ 'clase' ];
$form[ COL_FLAG_ACTIVO ] = ($form[ COL_FLAG_ACTIVO ] == 'TRUE') ? TRUE : FALSE;
$arrayTrans = array();
if (isset($form[ 'trans' ]) and $form[ 'trans' ] != NULL) {
    $allTrans = explode(';', $form[ 'trans' ]);
    foreach ($allTrans as $eachTrans) {
        $trans = explode(':', $eachTrans);
        $gt = array(
            'id_locale' => (int)trim($trans[ 0 ]),
            'text'      => trim($trans[ 1 ])
        );
        array_push($arrayTrans, $gt);
    }
}
$form[ 'trans' ] = $arrayTrans;
unset($form[ 'clase' ]);
if ($clase == 'User') {
    $obj = new $clase($form, FALSE);
} else {
    $obj = new $clase($form);
}
try {
    $controller = Tools::getController($obj);
} catch (Exception $e) { ?>
    <div class="alert alert-danger" role="alert">
        <strong>Oh porras!</strong> <?php echo $e->getMessage(); ?>...
    </div>
    <?php exit;
}
// si es un resource
if ($obj instanceof Resource) {
    $file = $_FILES[ 'file' ];
    $obj->setName($file[ 'name' ]);
    $obj->setMimetype($file[ 'type' ]);
    $obj->setSize($file[ 'size' ]);
    $obj->setFile(Tools::encode64($file[ 'tmp_name' ]));
}
if ($controller->create($obj)) { ?>
    <div class="alert alert-success" role="alert">
        <strong>Perfecto!</strong> Se ha persistido el documento.
    </div>
<?php } else { ?>
    <div class="alert alert-danger" role="alert">
        <strong>Oh porras,</strong> ocurrió un error con el documento...
    </div>
<?php }