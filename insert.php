<?php
/* $Id: insert.php,v 1.1 2003/03/05 17:30:24 robbat2 Exp $ */

include('header.inc.php');

$allowed = array(
'Objects',
'Manufacters',
'Purchases',
'ObjectTypes',
'CheckOuts',
'Users',
'Groups',
'Bookings',
'Notes',
'Actions'
);

$table = isset($_GET['table']) ? $_GET['table'] : '';
if(!in_array($table,$allowed)) {
//show an error here
include('accessdenied.php');
exit;
}

//ok, we are now validated
include('table/'.strtolower($table).'.php')

?>
