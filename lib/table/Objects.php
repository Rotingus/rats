<?php
/* $Id: Objects.php,v 1.1 2003/05/07 11:22:39 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/lib/table/Objects.php,v $ */

//table name goes here
$_tn  = 'Objects';

/*
$_t['field']['longname'] = '';
$_t['field']['datatype'] = '';
$_t['field']['inputtype'] = '';
$_t['field']['locked'] = '';
$_t['field']['ishidden'] = '';
*/

$_t['ObjectID']['isid'] = TRUE;

$_t['ObjectBarcode']['longname'] = 'Barcode';
$_t['ObjectBarcode']['datatype'] = 'BIGINT';
$_t['ObjectBarcode']['inputtype'] = 'text';
$_t['ObjectBarcode']['ishidden'] = FALSE;

$_t['ObjectName']['longname'] = 'Name';
$_t['ObjectName']['datatype'] = 'VARCHAR';
$_t['ObjectName']['inputtype'] = 'text';
$_t['ObjectName']['ishidden'] = FALSE;

$_t['ObjectTypeID']['longname'] = 'Object Type';
$_t['ObjectTypeID']['datatype'] = 'INT';
$_t['ObjectTypeID']['inputtype'] = 'select';
$_t['ObjectTypeID']['ishidden'] = FALSE;
$_t['ObjectTypeID']['keyto'] = 'ObjectTypes.ObjectTypeID';

$_t['ObjectSerialNumber']['longname'] = 'SerialNumber';
$_t['ObjectSerialNumber']['datatype'] = 'VARCHAR';
$_t['ObjectSerialNumber']['inputtype'] = 'text';
$_t['ObjectSerialNumber']['ishidden'] = FALSE;

$_t['PurchaseID']['longname'] = 'PurchaseID';
$_t['PurchaseID']['datatype'] = 'INT';
$_t['PurchaseID']['inputtype'] = 'select';
$_t['PurchaseID']['ishidden'] = FALSE;
$_t['PurchaseID']['keyto'] = 'Purchases.PurchaseID';

$_t['ObjectGroupID']['longname'] = 'Object Group';
$_t['ObjectGroupID']['datatype'] = 'INT';
$_t['ObjectGroupID']['inputtype'] = 'text';
$_t['ObjectGroupID']['ishidden'] = FALSE;

$_t['ObjectInGroup']['longname'] = 'Object Group Status';
$_t['ObjectInGroup']['datatype'] = 'ENUM';
$_t['ObjectInGroup']['inputtype'] = 'select';
$_t['ObjectInGroup']['ishidden'] = FALSE;

$_t['_view_sql'] = 'SELECT __KEY__ ObjectBarcode, ObjectName, ObjectTypeID, ObjectSerialNumber, PurchaseID, ObjectGroupID, ObjectInGroup 
FROM Objects';
$_t['_view_cols'] = array('ObjectBarcode','ObjectName','ObjectTypeID','ObjectTypeID','ObjectSerialNumber','PurchaseID','ObjectGroupID','ObjectInGroup');

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
