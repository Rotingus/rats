<?php
/* $Id: Users.php,v 1.1 2003/03/15 00:20:46 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/lib/table/Users.php,v $ */

//table name goes here
$_tn  = 'Users';
$_t = array();

/*
$_t['field']['longname'] = '';
$_t['field']['datatype'] = '';
$_t['field']['inputtype'] = '';
$_t['field']['locked'] = '';
$_t['field']['hidden'] = '';
*/

$_t['UserID']['longname'] = '';
$_t['UserID']['datatype'] = '';
$_t['UserID']['inputtype'] = '';
$_t['UserID']['locked'] = '';
$_t['UserID']['hidden'] = TRUE;

$_t['UserBarcode']['longname'] = 'Barcode';
$_t['UserBarcode']['datatype'] = 'BIGINT';
$_t['UserBarcode']['inputtype'] = 'text';
$_t['UserBarcode']['locked'] = FALSE;
$_t['UserBarcode']['hidden'] = FALSE;

$_t['UserLogin']['longname'] = 'Login';
$_t['UserLogin']['datatype'] = 'VARCHAR';
$_t['UserLogin']['inputtype'] = 'text';
$_t['UserLogin']['locked'] = FALSE;
$_t['UserLogin']['hidden'] = FALSE;

$_t['UserPassword']['longname'] = 'Password';
$_t['UserPassword']['datatype'] = 'VARCHAR';
$_t['UserPassword']['inputtype'] = 'text';
$_t['UserPassword']['locked'] = FALSE;
$_t['UserPassword']['hidden'] = FALSE;


$_t['_view_sql'] = 'SELECT __COLUMNS__ FROM __TABLE__';
$_t['_view_cols'] = array('UserBarcode','UserLogin','UserPassword');

global $tableData;
$_t['_name'] = $_tn;
$tableData[$_tn] = $_t;

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
