<?php
/* $Id: leftframe.php,v 1.4 2003/03/14 12:56:23 robbat2 Exp $ */

include('header.inc.php');

//codes are:
// v = view
// a = add
// va = both
function item($n,$type = 'v') {
  $tbl = 'table='.str_replace(' ','',$n);
  $viewfile = 'view.php';
  $addfile = 'insert.php';
  $target = 'target="main"';
  $class = 'leftnavitem';
  if(is_integer(strpos($type,'v')) || is_integer(strpos($type,'a'))) {
      echo html_a($viewfile.'?'.$tbl,$n,$class,$target);
  }
  if(is_integer(strpos($type,'a'))) {
      echo html_a($addfile.'?'.$tbl,'(Add)',$class,$target);
  }
  echo '<br />'."\n";
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

echo html_a('transactions.php','Transactions','leftnavitem','target="_top"').'<br />'."\n";
echo html_a('logout.php','Logout','leftnavitem','target="_top"')."\n";

include 'footer.inc.php';
?>
