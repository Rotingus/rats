<?php
/* $Id: commontable.inc.php,v 1.3 2003/03/15 00:23:51 robbat2 Exp $ */

global $tableName;

$tableName = isset($_GET['table']) ? $_GET['table'] : '';

$validPermissions = false;

//check permissions
if(!admin_haspermissions($tableName,$perm)) {
//show an error here
echo "include('./gui/permissiondenied.php')";
} else {
//ok, we are ok
include './lib/table/'.$tableName.'.php';
$validPermissions = true;
}

?>

