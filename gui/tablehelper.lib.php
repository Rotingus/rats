<?php
/* $Id: tablehelper.lib.php,v 1.1 2003/05/01 22:19:55 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/gui/tablehelper.lib.php,v $ */

function guiedit($table,$id) {
    $param = 't='.$table.'&amp;id='.$id;
    $file = 'edit.php'
    $title = 'Edit';
    return html_a($file.'?'.$param,$title);
}
function guidelete($table,$id) {
    $param = 't='.$table.'&amp;id='.$id;
    $file = 'delete.php'
    $title = 'Delete';
    return html_a($file.'?'.$param,$title);
}

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
