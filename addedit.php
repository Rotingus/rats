<?php
/* $Id: addedit.php,v 1.3 2003/05/29 04:03:49 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/addedit.php,v $ */

include './header.inc.php';

$perm = 'add';

include 'lib/commontable.inc.php';

if($tablePerm[$perm]) {
?>
<form action="addedit.php" method="POST" class="dataform">
<table class="dataform">
<?php
include 'gui/formbuilder.lib.php';
?>
</table></form>
<?php
    //TODO
} else {
    echo 'permission denied';
}

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
