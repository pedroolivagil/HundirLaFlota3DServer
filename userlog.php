<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once('config.php');

//var_dump();
?>
<!doctype html>
<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <style>
            tr {
                width: 100%;
                display: inline-table;
                table-layout: fixed;
            }

            table{
                height:700px;              /*Select the height of the table*/
                display: -moz-groupbox;    /* Firefox Bad Effect*/
            }
            thead{
                width: 98% !important;
                position: absolute;
            }
            tbody{
                overflow-y: scroll;      
                height: 710px;            /* Select the height of the body*/
                width: 99.5%;
                position: absolute;
                top:38px;
            } 
            td {
                overflow: hidden;
                min-height: 20px;
            }
            td:first-child {
                width: 50px !important;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <table class="table table-bordered table-responsive table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Action</td>
                    <td>State</td>
                    <td>Author</td>
                    <td>Range</td>
                    <td>IP</td>
                    <td>Table</td>
                    <td>User</td>
                    <td>Date</td>
                    <td>Old value</td>
                    <td>New value</td>
                    <td>Cause</td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach (Tools::readPrintLog() as $key => $log) {
                    ?>
                    <tr <?php echo ($log->getState() == 'OK') ? '' : 'class="danger"'; ?>>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $log->getAction(); ?></td>
                        <td><?php echo $log->getState(); ?></td>
                        <td><?php echo $log->getAuthor(); ?></td>
                        <td><?php echo $log->getAuthorRange(); ?></td>
                        <td><?php echo $log->getAuthorIp(); ?></td>
                        <td><?php echo $log->getToTable(); ?></td>
                        <td><?php echo Tools::serialize($log->getToUser()); ?></td>
                        <td><?php echo Tools::formatDate($log->getLogDate()); ?></td>
                        <td><?php echo Tools::serialize($log->getOldValue()); ?></td>
                        <td><?php echo Tools::serialize($log->getNewValue()); ?></td>
                        <td><?php echo $log->getAuthorCause(); ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </body>
</html>
<?php
