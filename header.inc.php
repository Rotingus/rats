<?php
/* $Id: header.inc.php,v 1.6 2003/03/14 12:49:30 robbat2 Exp $ */
include 'include.php';
include './gui/header.inc.php';

// validate user stuff
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
