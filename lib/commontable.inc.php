<?php
/* $Id: commontable.inc.php,v 1.2 2003/03/14 12:56:53 robbat2 Exp $ */

$table = isset($_GET['table']) ? $_GET['table'] : '';

$validPermissions = false;

//check permissions
if(!admin_haspermissions($table)) {
//show an error here
echo "include('./gui/permissiondenied.php')";
} else {
//ok, we are ok
include('./lib/table/'.$table.'.php')
$validPermissions = true;
}

?>

