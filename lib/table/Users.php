<?php
/* $Id: Users.php,v 1.2 2003/05/06 20:58:59 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/lib/table/Users.php,v $ */

//table name goes here
$_tn  = 'Users';

/*
$_t['field']['longname'] = '';
$_t['field']['datatype'] = '';
$_t['field']['inputtype'] = '';
$_t['field']['locked'] = '';
$_t['field']['ishidden'] = '';
*/

$_t['UserID']['isid'] = TRUE;

$_t['UserBarcode']['longname'] = 'Barcode';
$_t['UserBarcode']['datatype'] = 'BIGINT';
$_t['UserBarcode']['inputtype'] = 'text';
$_t['UserBarcode']['ishidden'] = FALSE;

$_t['UserLogin']['longname'] = 'User Login';
$_t['UserLogin']['datatype'] = 'VARCHAR';
$_t['UserLogin']['inputtype'] = 'text';
$_t['UserLogin']['ishidden'] = FALSE;

$_t['UserPassword']['longname'] = 'Password';
$_t['UserPassword']['datatype'] = 'VARCHAR';
$_t['UserPassword']['inputtype'] = 'text';
$_t['UserPassword']['ishidden'] = FALSE;

$_t['_view_cols'] = array('UserBarcode','UserLogin','UserPassword');

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
