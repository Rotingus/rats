<?php
/* $Id: addedit.php,v 1.2 2003/05/27 18:57:29 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/addedit.php,v $ */

include './header.inc.php';

$perm = 'add';

include 'lib/commontable.inc.php';
include 'gui/formbuilder.lib.php';

if($tablePerm[$perm]) {
    echo 'forms here';
    //TODO
} else {
    echo 'permission denied';
}

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
