<?php
    /* $Id: header.inc.php,v 1.3 2003/03/13 09:38:32 robbat2 Exp $ */
    include 'include.php';
include './gui/header.inc.php';
if (isset($skipvalidate) && $skipvalidate && !isset($_COOKIE['skipvalidate'])
    && !isset($_GET['skipvalidate']) && !isset($_POST['skipvalidate'])) {
    $uservalid = TRUE;
    $validationskipped = TRUE;
} else {
    $uservalid = validateuser();
    $validationskipped = FALSE;
}

?>
