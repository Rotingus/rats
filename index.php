<?php
/* $Id: index.php,v 1.9 2003/05/07 19:57:20 robbat2 Exp $ */
/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */

$skipvalidate = TRUE;

include 'header.inc.php';
include 'gui/title.inc.php';
include 'gui/login.inc.php';

if(isset($_GET['loginerror']) && $_GET['loginerror']) {
    $loginerror = TRUE;
    include 'gui/invalidlogin.inc.php';
} else {
    $loginerror = FALSE;
}

include 'footer.inc.php';
?>
