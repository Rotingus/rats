<?php
/* $Id: UserGroupMapping.php,v 1.2 2003/05/29 03:50:22 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/lib/table/UserGroupMapping.php,v $ */

//table name goes here
$_tn  = 'UserGroupMapping';

$_t['UserGroupMappingID']['isid'] = TRUE;

$_t['UserID']['longname'] = 'User';
$_t['UserID']['datatype'] = 'ID';
$_t['UserID']['inputtype'] = 'select';
$_t['UserID']['ishidden'] = FALSE;
$_t['UserID']['keyto'] = 'UserLogin';
$_t['UserID']['keytable'] = 'Users';

$_t['GroupID']['longname'] = 'Group';
$_t['GroupID']['datatype'] = 'ID';
$_t['GroupID']['inputtype'] = 'select';
$_t['GroupID']['ishidden'] = FALSE;
$_t['GroupID']['keyto'] = 'GroupName';
$_t['GroupID']['keytable'] = 'Groups';

$_t['_view_sql'] = 'SELECT __KEY__ UserLogin, GroupName FROM Users JOIN __TABLE__ USING (UserID) JOIN Groups USING (GroupID)';
$_t['_view_cols'] = array('UserID','GroupID');

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
