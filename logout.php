<?php
/* $Id: logout.php,v 1.2 2003/06/23 18:12:02 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/logout.php,v $ */

include './header.inc.php';

admin_session_destroy();

echo '<p>You have been logged out.</p>';

header("Refresh: 45;url=http://");
httpredirectafter(15);

include './footer.inc.php';

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
