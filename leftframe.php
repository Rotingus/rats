<?php
/* $Id: leftframe.php,v 1.1 2003/01/23 21:02:55 robbat2 Exp $ */
include 'include.php';
include './gui/header.inc.php';

function item($n) {
  echo html_a(strtolower($n).'php',$n,'leftnavitem','target="main"');
}

$a = array(
'Objects',
'Manufacters',
'Purchases',
'ObjectTypes',
'CheckOuts',
'Users',
'Groups',
'Bookings',
'Notes',
'Transactions',
'Actions'
);

foreach($a as $i) {
item($i);
};

include './gui/footer.inc.php';
?>
