<?php
/* $Id: commontable.inc.php,v 1.6 2003/05/06 20:59:53 robbat2 Exp $ */

global $tableName;

$tableName = isset($_GET['table']) ? $_GET['table'] : '';

$tablePerm = admin_getpermissionstable($sessionInfo['userid'],$tableName);

//check permissions
if(!$tablePerm[$perm]) {
//show an error here
echo "include('./gui/permissiondenied.php')";
} else {
//ok, we are ok
include './lib/processtable.inc.php';
}

?>

