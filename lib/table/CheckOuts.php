<?php
/* $Id: CheckOuts.php,v 1.6 2004/06/08 13:35:42 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/lib/table/CheckOuts.php,v $ */

//table name goes here
$_tn  = 'CheckOuts';

$_t['CheckOutID']['isid'] = TRUE;

$_t['CheckOutDate']['longname'] = 'Timestamp';
$_t['CheckOutDate']['datatype'] = 'TIMESTAMP';
$_t['CheckOutDate']['inputtype'] = 'dateselect';
$_t['CheckOutDate']['islocked'] = TRUE;
$_t['CheckOutDate']['ishidden'] = FALSE;

$_t['UserID']['longname'] = 'User';
$_t['UserID']['datatype'] = 'ID';
$_t['UserID']['inputtype'] = 'select';
$_t['UserID']['islocked'] = TRUE;
$_t['UserID']['ishidden'] = FALSE;
$_t['UserID']['keyto'] = 'UserLogin';
$_t['UserID']['keytable'] = 'Users';

$_t['ObjectID']['longname'] = 'Object';
$_t['ObjectID']['datatype'] = 'ID';
$_t['ObjectID']['inputtype'] = 'select';
$_t['ObjectID']['islocked'] = TRUE;
$_t['ObjectID']['ishidden'] = FALSE;
$_t['ObjectID']['keyto'] = 'ObjectName';
$_t['ObjectID']['keytable'] = 'Objects';

$_t['ObjectBarcode']['longname'] = 'Barcode';
$_t['ObjectBarcode']['datatype'] = 'INT';
$_t['ObjectBarcode']['inputtype'] = 'text';
$_t['ObjectBarcode']['islocked'] = TRUE;
$_t['ObjectBarcode']['ishidden'] = FALSE;

$_t['CheckOutDueDate']['longname'] = 'Due Date';
$_t['CheckOutDueDate']['datatype'] = 'DATETIME';
$_t['CheckOutDueDate']['inputtype'] = 'dateselect';
$_t['CheckOutDueDate']['islocked'] = TRUE;
$_t['CheckOutDueDate']['ishidden'] = FALSE;

$_t['_view_sql'] = 'SELECT CheckOutID, CheckOutDate, UserLogin, ObjectName, ObjectBarcode,CheckOutDueDate
FROM Users JOIN CheckOuts USING (UserID) JOIN Objects USING (ObjectID) JOIN
ObjectTypes USING (ObjectTypeID)';
$_t['_view_cols'] = array('CheckOutDate','UserID','ObjectID','CheckOutDueDate');

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
