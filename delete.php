<?php
/* $Id: delete.php,v 1.2 2003/06/22 23:07:07 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/delete.php,v $ */

include './header.inc.php';

$perm = v('perm','del');

include 'lib/commontable.inc.php';

if($tablePerm[$perm]) {
    $idDel = v('id');
    $tableDel = v('table');
    $query = 'DELETE FROM '.$tableName.' WHERE '.$tableData[$tableName]['_idkey'].'='.MySQL_quote($idDel);
    echo $query;
    $m = _MySQL_queryhelper($query);
    $m->checkerror();
    $_SESSION['msg'] = 'Item deleted from '.$tableName;
    if(!dodbg()) { 
        httpredirect('view.php?table='.$tableName);
    }
}

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
