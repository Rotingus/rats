<?php
/* $Id: debug.lib.php,v 1.1 2003/06/22 23:07:49 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/lib/debug.lib.php,v $ */

function dodbg($level = 1) {
    return isset($_SESSION) && isset($_SESSION['debug']) && $_SESSION['debug'] >= $level;
}

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
