<?php
/* $Id: commontable.inc.php,v 1.4 2003/04/29 20:47:53 robbat2 Exp $ */

global $tableName;

$tableName = isset($_GET['table']) ? $_GET['table'] : '';

$validPermissions = admin_haspermissions($sessionInfo['userid'],$tableName,$perm);

//check permissions
if(!$validPermissions) {
//show an error here
echo "include('./gui/permissiondenied.php')";
} else {
//ok, we are ok
include './lib/table/'.$tableName.'.php';
}

?>

