<?php
/* $Id: tablehelper.lib.php,v 1.4 2003/06/05 22:33:29 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/gui/tablehelper.lib.php,v $ */

function guiEdit($table,$id) {
    $param = 'perm=edit&amp;table='.$table.'&amp;id='.$id;
    $file = 'addedit.php';
    $title = 'Edit';
    return html_a($file.'?'.$param,$title);
}
function guiDelete($table,$id) {
    $param = 'perm=delete&amp;table='.$table.'&amp;id='.$id;
    $file = 'delete.php';
    $title = 'Delete';
    return html_a($file.'?'.$param,$title);
}

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
