<?php
/* $Id: commontable.inc.php,v 1.7 2003/05/07 20:48:10 robbat2 Exp $ */

global $tableName;

$tableName = v('table');

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

