<?php
/* $Id: Transactions.php,v 1.2 2003/05/29 03:50:22 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/lib/table/Transactions.php,v $ */

//table name goes here
$_tn  = 'Transactions';

/*
$_t['field']['longname'] = '';
$_t['field']['datatype'] = '';
$_t['field']['inputtype'] = '';
$_t['field']['islocked'] = FALSE;
$_t['field']['ishidden'] = TRUE;
$_t['field']['iskey'] = FALSE;
*/

$_t['TransactionID']['isid'] = TRUE;

$_t['TransactionDate']['longname'] = 'Timestamp';
$_t['TransactionDate']['datatype'] = 'DATE';
$_t['TransactionDate']['inputtype'] = 'dateselect';
$_t['TransactionDate']['ishidden'] = FALSE;
$_t['TransactionDate']['islocked'] = TRUE;

$_t['UserID']['longname'] = 'User';
$_t['UserID']['datatype'] = 'ID';
$_t['UserID']['inputtype'] = 'select';
$_t['UserID']['islocked'] = TRUE;
$_t['UserID']['ishidden'] = FALSE;
$_t['UserID']['keyto'] = 'UserLogin';
$_t['UserID']['keytable'] = 'Users';

$_t['ActionID']['longname'] = 'Action';
$_t['ActionID']['datatype'] = 'ID';
$_t['ActionID']['inputtype'] = 'select';
$_t['ActionID']['islocked'] = TRUE;
$_t['ActionID']['ishidden'] = FALSE;
$_t['ActionID']['keyto'] = 'CONCAT(ActionGenericTable,\'-\',ActionType)';
$_t['ActionID']['keytable'] = 'Actions';

$_t['TransactionGenericID']['longname'] = 'ID';
$_t['TransactionGenericID']['datatype'] = 'INT';
$_t['TransactionGenericID']['inputtype'] = 'text';
$_t['TransactionGenericID']['ishidden'] = FALSE;
$_t['TransactionGenericID']['islocked'] = TRUE;

$_t['_view_cols'] = array('TransactionDate','UserID','ActionID','TransactionGenericID');
$_t['_view_sql'] = 'SELECT __KEY__  TransactionDate, UserLogin, CONCAT(ActionGenericTable,\'-\',ActionType) FROM Actions JOIN Transactions USING (ActionID) LEFT JOIN Users USING (UserID)';

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
