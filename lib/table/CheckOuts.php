<?php
/* $Id: CheckOuts.php,v 1.3 2003/05/06 20:58:59 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/lib/table/CheckOuts.php,v $ */

//table name goes here
$_tn  = 'CheckOuts';

$_t['CheckOutID']['isid'] = TRUE;
$_t['UserID']['longname'] = 'User';
$_t['UserID']['datatype'] = 'VARCHAR';
$_t['UserID']['inputtype'] = 'select';
$_t['UserID']['islocked'] = TRUE;
$_t['UserID']['ishidden'] = FALSE;
$_t['UserID']['keyto'] = 'Users.UserName';

$_t['ObjectID']['longname'] = 'Object';
$_t['ObjectID']['datatype'] = 'VARCHAR';
$_t['ObjectID']['inputtype'] = 'select';
$_t['ObjectID']['islocked'] = TRUE;
$_t['ObjectID']['ishidden'] = FALSE;
$_t['ObjectID']['keyto'] = 'Objects.ObjectName';

$_t['CheckOutDueDate']['longname'] = 'Due Date';
$_t['CheckOutDueDate']['datatype'] = 'DATETIME';
$_t['CheckOutDueDate']['inputtype'] = 'dateselect';
$_t['CheckOutDueDate']['islocked'] = TRUE;
$_t['CheckOutDueDate']['ishidden'] = FALSE;

$_t['_view_sql'] = 'SELECT CheckOutID, UserLogin, ObjectName, CheckOutDueDate 
FROM Users JOIN CheckOuts USING (UserID) JOIN Objects USING (ObjectID) JOIN ObjectTypes USING (ObjectTypeID)';
$_t['_view_cols'] = array('UserID','ObjectID','CheckOutDueDate');

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
