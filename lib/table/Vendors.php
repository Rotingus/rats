<?php
/* $Id: Vendors.php,v 1.1 2003/05/07 10:01:14 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/lib/table/Vendors.php,v $ */

//table name goes here
$_tn  = 'Vendors';

/*
$_t['field']['longname'] = '';
$_t['field']['datatype'] = '';
$_t['field']['inputtype'] = '';
$_t['field']['locked'] = '';
$_t['field']['hidden'] = '';
*/

$_t['VendorID']['isid'] = TRUE;

$_t['VendorName']['longname'] = 'Name';
$_t['VendorName']['datatype'] = 'VARCHAR';
$_t['VendorName']['inputtype'] = 'text';
$_t['VendorName']['ishidden'] = FALSE;

$_t['VendorDetails']['longname'] = 'Details';
$_t['VendorDetails']['datatype'] = 'TEXT';
$_t['VendorDetails']['inputtype'] = 'text';
$_t['VendorDetails']['ishidden'] = FALSE;

$_t['_view_cols'] = array('VendorName','VendorDetails');

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
