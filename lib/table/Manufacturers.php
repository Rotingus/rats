<?php
/* $Id: Manufacturers.php,v 1.1 2003/04/30 18:26:45 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/lib/table/Attic/Manufacturers.php,v $ */

//table name goes here
$_tn  = 'Manufacters';

/*
$_t['field']['longname'] = '';
$_t['field']['datatype'] = '';
$_t['field']['inputtype'] = '';
$_t['field']['locked'] = '';
$_t['field']['hidden'] = '';
*/

$_t['ManufacterID']['isid'] = TRUE;

$_t['ManufacterName']['longname'] = 'Name';
$_t['ManufacterName']['datatype'] = 'VARCHAR';
$_t['ManufacterName']['inputtype'] = 'text';
$_t['ManufacterName']['ishidden'] = FALSE;

$_t['ManufacterDetails']['longname'] = 'Details';
$_t['ManufacterDetails']['datatype'] = 'TEXT';
$_t['ManufacterDetails']['inputtype'] = 'text';
$_t['ManufacterDetails']['ishidden'] = FALSE;

$_t['_view_cols'] = array('ManufacterName','ManufacterDetails');

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
