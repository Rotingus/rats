<?php
/* $Id: index.php,v 1.10 2003/06/12 17:43:47 robbat2 Exp $ */
/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */

$skipvalidate = TRUE;

include 'header.inc.php';
include 'gui/title.inc.php';
include 'gui/login.inc.php';

$loginerror = v('loginerror',0);

if($loginerror != '0') {
    include 'gui/invalidlogin.inc.php';
} else {
    $loginerror = FALSE;
}

include 'footer.inc.php';
?>
