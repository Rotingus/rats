<?php
/* $Id: leftframe.php,v 1.5 2003/03/24 20:11:17 robbat2 Exp $ */

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
  'Actions',
  'Bookings',
  'Check Outs',
  'Group Action Mapping',
  'Groups',
  'Manufacters',
  'Notes',
  'Object Types',
  'Objects',
  'Purchases',
  'User Group Mapping',
  'Users'
);

foreach($a as $i) {
item($i,'va');
};

echo html_a('transactions.php','Transactions','leftnavitem','target="_top"').'<br />'."\n";
echo html_a('logout.php','Logout','leftnavitem','target="_top"')."\n";

include 'footer.inc.php';
?>
