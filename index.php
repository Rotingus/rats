<?php
/* $Id: index.php,v 1.7 2003/03/13 11:28:13 robbat2 Exp $ */
/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */

$skipvalidate = TRUE;

include 'header.inc.php';
include 'gui/title.inc.php';
if(isset($_GET['loginerror']) && $_GET['loginerror']) {
    $loginerror = TRUE;
    include 'gui/invalidlogin.inc.php';
} else {
    $loginerror = FALSE;
}

include 'gui/login.inc.php';

include 'footer.inc.php';
?>
