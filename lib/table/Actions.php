<?php
/* $Id: Actions.php,v 1.2 2003/03/15 00:20:46 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/lib/table/Actions.php,v $ */

//table name goes here
$_tn  = 'Actions';
$_t = array();

/*
$_t['field']['longname'] = '';
$_t['field']['datatype'] = '';
$_t['field']['inputtype'] = '';
$_t['field']['locked'] = '';
$_t['field']['hidden'] = '';
*/

$_t['ActionID']['longname'] = '';
$_t['ActionID']['datatype'] = '';
$_t['ActionID']['inputtype'] = '';
$_t['ActionID']['locked'] = '';
$_t['ActionID']['hidden'] = TRUE;

$_t['ActionCode']['longname'] = 'Shortcut';
$_t['ActionCode']['datatype'] = 'VARCHAR';
$_t['ActionCode']['inputtype'] = 'text';
$_t['ActionCode']['locked'] = FALSE;
$_t['ActionCode']['hidden'] = FALSE;

$_t['ActionBarcode']['longname'] = 'Barcode';
$_t['ActionBarcode']['datatype'] = 'BIGINT';
$_t['ActionBarcode']['inputtype'] = 'text';
$_t['ActionBarcode']['locked'] = FALSE;
$_t['ActionBarcode']['hidden'] = FALSE;

$_t['ActionGenericTable']['longname'] = 'Table';
$_t['ActionGenericTable']['datatype'] = 'ENUM';
$_t['ActionGenericTable']['inputtype'] = 'select';
$_t['ActionGenericTable']['locked'] = FALSE;
$_t['ActionGenericTable']['hidden'] = FALSE;

$_t['ActionType']['longname'] = 'Action';
$_t['ActionType']['datatype'] = 'ENUM';
$_t['ActionType']['inputtype'] = 'select';
$_t['ActionType']['locked'] = FALSE;
$_t['ActionType']['hidden'] = FALSE;

$_t['_view_sql'] = 'SELECT __COLUMNS__ FROM __TABLE__';
$_t['_view_cols'] = array('ActionCode','ActionBarcode','ActionGenericTable','ActionType');

global $tableData;
$_t['_name'] = $_tn;
$tableData[$_tn] = $_t;

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
