<?php
/* $Id: header.inc.php,v 1.5 2003/03/13 11:52:17 robbat2 Exp $ */
include 'include.php';
include './gui/header.inc.php';
if (isset($skipvalidate) && $skipvalidate && !isset($_COOKIE['skipvalidate'])
        && !isset($_GET['skipvalidate']) && !isset($_POST['skipvalidate'])) {
    $uservalid = TRUE;
    $validationskipped = TRUE;
} else {
    $uservalid = admin_validate();
    if(!$uservalid) {
        //possible hack or invalid password
        header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/".'index.php'.'?loginerror=1');
        exit;
        //echo 'REDIRECT';
    }
    $validationskipped = FALSE;
}

?>
