<?php
/* $Id: Purchases.php,v 1.1 2003/05/07 10:01:14 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/lib/table/Purchases.php,v $ */

//table name goes here
$_tn  = 'Purchases';

$_t['PurchaseID']['isid'] = TRUE;

$_t['VendorID']['longname'] = 'Vendor';
$_t['VendorID']['datatype'] = 'VARCHAR';
$_t['VendorID']['inputtype'] = 'select';
$_t['VendorID']['ishidden'] = FALSE;
$_t['VendorID']['keyto'] = 'Vendors.VendorName';

$_t['PurchaseDetails']['longname'] = 'Details';
$_t['PurchaseDetails']['datatype'] = 'TEXT';
$_t['PurchaseDetails']['inputtype'] = 'text';
$_t['PurchaseDetails']['ishidden'] = FALSE;

$_t['_view_sql'] = 'SELECT __KEY__ VendorName, PurchaseDetails FROM Purchases JOIN Vendors USING (VendorID)';
$_t['_view_cols'] = array('VendorID','PurchaseDetails');

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
