<?php
/* $Id: leftframe.php,v 1.9 2003/06/20 18:19:31 robbat2 Exp $ */

include('header.inc.php');

//codes are:
// v = view
// a = add
// va = both
function item($n,$type = 'v') {
  $tbl = str_replace(' ','',$n);
  global $sessionInfo;
  $tablePerm = admin_getpermissionstable($sessionInfo['userid'],$tbl);
  $tblstr = 'table='.$tbl;

  $viewfile = 'view.php';
  $addfile = 'addedit.php';
  $target = 'target="main"';
  $class = 'leftnavitem';
  if($tablePerm['view']) {
      if(is_integer(strpos($type,'v')) || is_integer(strpos($type,'a'))) {
          echo html_a($viewfile.'?'.$tblstr,$n,$class,$target);
      }
      if($tablePerm['add'] && is_integer(strpos($type,'a'))) {
          echo html_a($addfile.'?'.$tblstr,'(Add)',$class,$target);
      }
      echo '<br />'."\n";
  }
}

$a = array(
  'Actions',
  'Bookings',
  'Check Outs',
  'Group Action Mapping',
  'Groups',
  'Vendors',
  'Notes',
  'Object Types',
  'Objects',
  'Purchases',
  'User Group Mapping',
  'Users',
  'Transactions'
);

//homepage link
echo html_a('rightframe.php','Home','leftnavitem','target="main"').'<br />'."\n";
//item links
foreach($a as $i) {
item($i,'va');
};
//logout stuff
//echo html_a('transactions.php','Transactions','leftnavitem','target="_top"').'<br />'."\n";
echo html_a('logout.php','Logout','leftnavitem','target="_top"')."\n";

include 'footer.inc.php';
?>
