<?php
/* $Id: header.inc.php,v 1.11 2003/06/22 23:07:30 robbat2 Exp $ */
error_reporting(E_ALL);
ob_start();
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
        //header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/".'index.php'.'?loginerror=1');
        httpredirect('index.php','?loginerror=baduserpass');
        //echo 'REDIRECT';
        exit;
    }
    $validationskipped = FALSE;
}
if(isset($_SESSION) && isset($_SESSION['msg'])) {
echo $_SESSION['msg'].'<br />'."\n";
unset($_SESSION['msg']);
}

?>
