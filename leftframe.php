<?php
/* $Id: leftframe.php,v 1.2 2003/03/05 17:30:24 robbat2 Exp $ */

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

include './gui/footer.inc.php';
?>
