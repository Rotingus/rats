<?php
/* $Id: ObjectTypes.php,v 1.1 2003/05/07 11:22:39 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/lib/table/ObjectTypes.php,v $ */

//table name goes here
$_tn  = 'ObjectTypes';

/*
$_t['field']['longname'] = '';
$_t['field']['datatype'] = '';
$_t['field']['inputtype'] = '';
$_t['field']['locked'] = '';
$_t['field']['ishidden'] = '';
*/

$_t['ObjectTypeID']['isid'] = TRUE;

$_t['VendorID']['longname'] = 'Vendor';
$_t['VendorID']['datatype'] = 'VARCHAR';
$_t['VendorID']['inputtype'] = 'select';
$_t['VendorID']['ishidden'] = FALSE;
$_t['VendorID']['keyto'] = 'Vendors.VendorName';

$_t['ObjectTypeGenericName']['longname'] = 'Generic Name';
$_t['ObjectTypeGenericName']['datatype'] = 'VARCHAR';
$_t['ObjectTypeGenericName']['inputtype'] = 'text';
$_t['ObjectTypeGenericName']['ishidden'] = FALSE;

$_t['ObjectTypeModel']['longname'] = 'Model';
$_t['ObjectTypeModel']['datatype'] = 'VARCHAR';
$_t['ObjectTypeModel']['inputtype'] = 'text';
$_t['ObjectTypeModel']['ishidden'] = FALSE;

$_t['ObjectTypeClass']['longname'] = 'Table';
$_t['ObjectTypeClass']['datatype'] = 'ENUM';
$_t['ObjectTypeClass']['inputtype'] = 'select';
$_t['ObjectTypeClass']['ishidden'] = FALSE;

$_t['ObjectTypePriority']['longname'] = 'Table';
$_t['ObjectTypePriority']['datatype'] = 'ENUM';
$_t['ObjectTypePriority']['inputtype'] = 'select';
$_t['ObjectTypePriority']['ishidden'] = FALSE;

$_t['ObjectTypeLoanDuration']['longname'] = 'Loan Duration';
$_t['ObjectTypeLoanDuration']['datatype'] = 'DATETIME';
$_t['ObjectTypeLoanDuration']['inputtype'] = 'dateselect';
$_t['ObjectTypeLoanDuration']['ishidden'] = FALSE;

$_t['ObjectTypeDescription']['longname'] = 'Description';
$_t['ObjectTypeDescription']['datatype'] = 'TEXT';
$_t['ObjectTypeDescription']['inputtype'] = 'text';
$_t['ObjectTypeDescription']['ishidden'] = FALSE;


$_t['_view_sql'] = 'SELECT __KEY__ VendorName, ObjectTypeGenericName, ObjectTypeModel, ObjectTypeClass, ObjectTypePriority, ObjectTypeLoanDuration, ObjectTypeDescription FROM ObjectTypes JOIN Vendors USING (VendorID)';
$_t['_view_cols'] = array('VendorID','ObjectTypeGenericName','ObjectTypeModel','ObjectTypeClass','ObjectTypePriority','ObjectTypeLoanDuration','ObjectTypeDescription');

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
