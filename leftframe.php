<?php
/* $Id: leftframe.php,v 1.3 2003/03/13 11:51:42 robbat2 Exp $ */

include('header.inc.php');

function item($n) {
  echo html_a('insert.php?table='.str_replace($n,' ',''),$n,'leftnavitem','target="main"')."\n";
}

$a = array(
'Objects',
'Manufacters',
'Purchases',
'Object Types',
'CheckOuts',
'Users',
'Groups',
'Bookings',
'Notes',
'Actions'
);

foreach($a as $i) {
item($i);
};

echo html_a('transactions.php','Transactions','leftnavitem','target="_top"')."\n";
echo html_a('logout.php','Logout','leftnavitem','target="_top"')."\n";

include 'footer.inc.php';
?>
