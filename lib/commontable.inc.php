<?php
/* $Id: commontable.inc.php,v 1.5 2003/04/30 18:16:48 robbat2 Exp $ */

global $tableName;

$tableName = isset($_GET['table']) ? $_GET['table'] : '';

$validPermissions = admin_haspermissions($sessionInfo['userid'],$tableName,$perm);

//check permissions
if(!$validPermissions) {
//show an error here
echo "include('./gui/permissiondenied.php')";
} else {
//ok, we are ok
include './lib/processtable.inc.php';
}

?>

