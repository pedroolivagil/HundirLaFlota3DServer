<?php
/**
 * Created by OliLogicStudios.
 * User: OlivaDevelop
 * Project: HundirLaFlota3DServer
 * File: userlog.php
 * Date: 09/08/2017 02:48
 */
include_once('config.php');
?>
    <!doctype html>
    <html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
              crossorigin="anonymous">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
              integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
              crossorigin="anonymous">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
                integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
                crossorigin="anonymous"></script>
        <style>
            tr {
                width: 100%;
                display: inline-table;
                table-layout: fixed;
            }

            table {
                height: 700px; /*Select the height of the table*/
                display: -moz-groupbox; /* Firefox Bad Effect*/
            }

            thead {
                width: 98% !important;
                position: absolute;
            }

            tbody {
                overflow-y: scroll;
                height: 710px; /* Select the height of the body*/
                width: 99.5%;
                position: absolute;
                top: 38px;
            }

            td {
                overflow: auto;
                min-height: 20px;
            }

            td:first-child {
                width: 50px !important;
                text-align: center;
            }

            td.width60 {
                width: 60px !important;
                text-align: center;
            }

            td.width80 {
                width: 80px !important;
            }

            td.width125 {
                width: 125px !important;
            }
        </style>
    </head>
    <body>
    <table class="table table-bordered table-responsive table-striped">
        <thead>
        <tr>
            <td>ID</td>
            <td class="width80">Action</td>
            <td class="width60">State</td>
            <td class="width60">Author</td>
            <td class="width60">Range</td>
            <td class="width125">IP</td>
            <td>Table</td>
            <td>User</td>
            <td>Date</td>
            <td>Old value</td>
            <td>New value</td>
            <!--<td>Cause</td>-->
        </tr>
        </thead>
        <tbody>
        <?php
        $results = Tools::readPrintLog();
        $total = count($results);
        foreach (array_reverse($results) as $log) {
            ?>
            <tr <?php echo ($log->getState() == 'OK') ? '' : 'class="danger"'; ?>>
                <td><?php echo $total--; ?></td>
                <td class="width80"><?php echo $log->getAction(); ?></td>
                <td class="width60"><?php echo $log->getState(); ?></td>
                <td class="width60"><?php echo $log->getAuthor(); ?></td>
                <td class="width60"><?php echo $log->getAuthorRange(); ?></td>
                <td class="width125"><?php echo $log->getAuthorIp(); ?></td>
                <td><?php echo $log->getToTable(); ?></td>
                <td><?php echo Tools::serialize($log->getToUser()); ?></td>
                <td><?php echo Tools::formatDate($log->getLogDate()); ?></td>
                <td><?php echo Tools::serialize($log->getOldValue()); ?></td>
                <td><?php echo Tools::serialize($log->getNewValue()); ?></td>
                <!--<td><?php echo $log->getAuthorCause(); ?></td>-->
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    </body>
    </html>
<?php
