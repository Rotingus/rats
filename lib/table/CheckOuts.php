<?php
/* $Id: CheckOuts.php,v 1.1 2003/03/15 00:20:46 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/lib/table/CheckOuts.php,v $ */

//table name goes here
$_tn  = 'CheckOuts';

$_t['UserID']['longname'] = 'User';
$_t['UserID']['datatype'] = 'VARCHAR';
$_t['UserID']['inputtype'] = 'select';
$_t['UserID']['locked'] = TRUE;
$_t['UserID']['hidden'] = FALSE;
$_t['UserID']['keyto'] = 'Users.UserName';
$_t['ObjectID']['longname'] = 'Object';
$_t['ObjectID']['datatype'] = 'VARCHAR';
$_t['ObjectID']['inputtype'] = 'select';
$_t['ObjectID']['locked'] = TRUE;
$_t['ObjectID']['hidden'] = FALSE;
$_t['ObjectID']['keyto'] = 'Objects.ObjectName';
$_t['CheckOutDueDate']['longname'] = 'Due Date';
$_t['CheckOutDueDate']['datatype'] = 'DATETIME';
$_t['CheckOutDueDate']['inputtype'] = 'dateselect';
$_t['CheckOutDueDate']['locked'] = TRUE;
$_t['CheckOutDueDate']['hidden'] = FALSE;

//$_t['_view_sql'] = 'SELECT __COLUMNS__ FROM __TABLE__';
//$_t['_view_cols'] = array('ActionCode','ActionBarcode','ActionGenericTable','ActionType');

$_t['_view_sql'] = 'SELECT u.UserLogin AS UserID, o.ObjectName AS ObjectID, c.CheckOutDueDate FROM CheckOuts c, Users u, Objects o WHERE u.UserID = c.UserID AND o.ObjectID = c.ObjectID';
$_t['_view_cols'] = array('UserID','ObjectID','CheckOutDueDate');

global $tableData;
$_t['_name'] = $_tn;
$tableData[$_tn] = $_t;

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
