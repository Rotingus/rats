<?php
/* $Id: rightframe.php,v 1.5 2004/06/08 13:38:58 robbat2 Exp $ */
/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
include 'header.inc.php';
?>
<br />
<br />
<br />
<h2 class="title">Include some running statisitcs here for the admin to see.</h2>
<h3>Adding new items quickstart:</h3>
<ol>
<li>Add the product manufacter (and vendor if different) via the <a href='addedit.php?table=Vendors'>Vendor Add</a> page.</lii>
<li>Add the purchase order via the <a href='addedit.php?table=Purchases'>Purchase Add</a> page. On this page, 'Vendor' represents the company that sold it to you.</li>
<li>Add the object type via the <a href='addedit.php?table=ObjectTypes'>Object Types Add</a> page. On this page, 'Vendor' represents the company that manufacteres the product.</li>
<li>Add the object via the <a href='addedit.php?table=Objects'>Object Add</a> page.</li>
<li>(Repeat the above steps as needed)</li>
</ol>
<br />
<?php 
$dbg = v('debugset',0);
if(!isset($_SESSION['debug'])) {
    $_SESSION['debug'] = 0;
}
$dbgmsg = '';
if($dbg === 'inc') {
    $_SESSION['debug']++;
    $dbgmsg = 'increased';
} elseif($dbg === 'dec') {
    if($_SESSION['debug'] > 0) {
        $_SESSION['debug']--;
    }
    $dbgmsg = 'decreased';
} elseif($dbg === 'off') {
    $_SESSION['debug'] = 0;
    $dbgmsg = 'turned off';
}
unset($dbg);
if(!empty($dbgmsg)) {
    echo 'Debugging '.$dbgmsg.'<br />'."\n";
}
?>
<h4>Debug Level: <?php echo $_SESSION["debug"]; ?></h4>
<a href='<?php echo $_SERVER['SCRIPT_NAME'] ?>?debugset=off'>Turn off Debugging</a><br />
<a href='<?php echo $_SERVER['SCRIPT_NAME'] ?>?debugset=inc'>Increase Debug Level</a><br />
<a href='<?php echo $_SERVER['SCRIPT_NAME'] ?>?debugset=dec'>Decrease Debug Level</a>
<?php
include 'footer.inc.php';
?>
