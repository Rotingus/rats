<?php
// validate login
// either display error
// or good results
$frames = TRUE;
include 'header.inc.php';
if(isset($uservalid) && $uservalid && isset($validationskipped) && !$validationskipped) {
    $mode = v('mode','normal');
    if($mode == 'kiosk') {
        httpredirect('kiosk.php');
    } else {
        httpredirect('main.php');
    }
}
include 'footer.inc.php';
?>
