<?php
/* $Id: Actions.php,v 1.3 2003/04/30 18:16:48 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/lib/table/Actions.php,v $ */

//table name goes here
$_tn  = 'Actions';

/*
$_t['field']['longname'] = '';
$_t['field']['datatype'] = '';
$_t['field']['inputtype'] = '';
$_t['field']['islocked'] = FALSE;
$_t['field']['ishidden'] = TRUE;
$_t['field']['iskey'] = FALSE;
*/

$_t['ActionID']['isid'] = TRUE;

$_t['ActionCode']['longname'] = 'Shortcut';
$_t['ActionCode']['datatype'] = 'VARCHAR';
$_t['ActionCode']['inputtype'] = 'text';
$_t['ActionCode']['ishidden'] = FALSE;

$_t['ActionBarcode']['longname'] = 'Barcode';
$_t['ActionBarcode']['datatype'] = 'BIGINT';
$_t['ActionBarcode']['inputtype'] = 'text';
$_t['ActionBarcode']['ishidden'] = FALSE;

$_t['ActionGenericTable']['longname'] = 'Table';
$_t['ActionGenericTable']['datatype'] = 'ENUM';
$_t['ActionGenericTable']['inputtype'] = 'select';
$_t['ActionGenericTable']['ishidden'] = FALSE;

$_t['ActionType']['longname'] = 'Action';
$_t['ActionType']['datatype'] = 'ENUM';
$_t['ActionType']['inputtype'] = 'select';
$_t['ActionType']['ishidden'] = FALSE;

$_t['_view_cols'] = array('ActionCode','ActionBarcode','ActionGenericTable','ActionType');

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
