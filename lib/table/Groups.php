<?php
/* $Id: Groups.php,v 1.1 2003/03/15 00:22:28 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/lib/table/Groups.php,v $ */

//table name goes here
$_tn  = 'Groups';
$_t = array();

/*
$_t['field']['longname'] = '';
$_t['field']['datatype'] = '';
$_t['field']['inputtype'] = '';
$_t['field']['locked'] = '';
$_t['field']['hidden'] = '';
*/

$_t['GroupID']['longname'] = '';
$_t['GroupID']['datatype'] = '';
$_t['GroupID']['inputtype'] = '';
$_t['GroupID']['locked'] = '';
$_t['GroupID']['hidden'] = TRUE;

$_t['GroupName']['longname'] = 'Name';
$_t['GroupName']['datatype'] = 'VARCHAR';
$_t['GroupName']['inputtype'] = 'text';
$_t['GroupName']['locked'] = FALSE;
$_t['GroupName']['hidden'] = FALSE;

$_t['_view_sql'] = 'SELECT __COLUMNS__ FROM __TABLE__';
$_t['_view_cols'] = array('GroupName');

global $tableData;
$_t['_name'] = $_tn;
$tableData[$_tn] = $_t;

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
