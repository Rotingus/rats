<?php
/* $Id: Bookings.php,v 1.1 2003/05/07 10:01:14 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/lib/table/Bookings.php,v $ */

//table name goes here
$_tn  = 'Bookings';

$_t['BookingID']['isid'] = TRUE;
$_t['UserID']['longname'] = 'User';
$_t['UserID']['datatype'] = 'VARCHAR';
$_t['UserID']['inputtype'] = 'select';
$_t['UserID']['islocked'] = TRUE;
$_t['UserID']['ishidden'] = FALSE;
$_t['UserID']['keyto'] = 'Users.UserName';

$_t['ObjectID']['longname'] = 'Object';
$_t['ObjectID']['datatype'] = 'VARCHAR';
$_t['ObjectID']['inputtype'] = 'select';
$_t['ObjectID']['islocked'] = TRUE;
$_t['ObjectID']['ishidden'] = FALSE;
$_t['ObjectID']['keyto'] = 'Objects.ObjectName';

$_t['BookingStartDate']['longname'] = 'Start Date';
$_t['BookingStartDate']['datatype'] = 'DATETIME';
$_t['BookingStartDate']['inputtype'] = 'dateselect';
$_t['BookingStartDate']['islocked'] = TRUE;
$_t['BookingStartDate']['ishidden'] = FALSE;

$_t['BookingEndDate']['longname'] = 'End Date';
$_t['BookingEndDate']['datatype'] = 'DATETIME';
$_t['BookingEndDate']['inputtype'] = 'dateselect';
$_t['BookingEndDate']['islocked'] = TRUE;
$_t['BookingEndDate']['ishidden'] = FALSE;

$_t['_view_sql'] = 'SELECT __KEY__ UserLogin, ObjectName, BookingStartDate, BookingEndDate FROM Users JOIN Bookings USING (UserID) JOIN Objects USING (ObjectID) JOIN ObjectTypes USING (ObjectTypeID)';
$_t['_view_cols'] = array('UserID','ObjectID','BookingStartDate','BookingEndDate');

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
