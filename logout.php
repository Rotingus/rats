<?php
/* $Id: logout.php,v 1.1 2003/04/22 18:35:52 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/logout.php,v $ */

include './header.inc.php';

admin_session_destroy();

echo '<p>You have been logged out.</p>';

include './footer.inc.php';

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
