<?php
/* $Id: Manufacters.php,v 1.1 2003/04/22 18:35:52 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/lib/table/Attic/Manufacters.php,v $ */

//table name goes here
$_tn  = 'Manufacters';
$_t = array();

/*
$_t['field']['longname'] = '';
$_t['field']['datatype'] = '';
$_t['field']['inputtype'] = '';
$_t['field']['locked'] = '';
$_t['field']['hidden'] = '';
*/

$_t['ManufacterID']['longname'] = '';
$_t['ManufacterID']['datatype'] = '';
$_t['ManufacterID']['inputtype'] = '';
$_t['ManufacterID']['locked'] = '';
$_t['ManufacterID']['hidden'] = TRUE;

$_t['ManufacterName']['longname'] = 'Name';
$_t['ManufacterName']['datatype'] = 'VARCHAR';
$_t['ManufacterName']['inputtype'] = 'text';
$_t['ManufacterName']['locked'] = FALSE;
$_t['ManufacterName']['hidden'] = FALSE;

$_t['ManufacterDetails']['longname'] = 'Details';
$_t['ManufacterDetails']['datatype'] = 'TEXT';
$_t['ManufacterDetails']['inputtype'] = 'text';
$_t['ManufacterDetails']['locked'] = FALSE;
$_t['ManufacterDetails']['hidden'] = FALSE;

$_t['_view_sql'] = 'SELECT __COLUMNS__ FROM __TABLE__';
$_t['_view_cols'] = array('ManufacterName','ManufacterDetails');

global $tableData;
$_t['_name'] = $_tn;
$tableData[$_tn] = $_t;

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
