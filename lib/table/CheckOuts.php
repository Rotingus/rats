<?php
/* $Id: CheckOuts.php,v 1.2 2003/04/30 18:16:48 robbat2 Exp $ */
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

$_t['_view_sql'] = 'SELECT UserLogin, ObjectName, CheckOutDueDate 
FROM Users JOIN CheckOuts USING (UserID) JOIN Objects USING (ObjectID) JOIN ObjectTypes USING (ObjectTypeID)';
$_t['_view_cols'] = array('UserID','ObjectID','CheckOutDueDate');

global $tableData;
$_t['_name'] = $_tn;
$tableData[$_tn] = $_t;

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
