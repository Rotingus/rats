<?php
/* $Id: UserGroupMapping.php,v 1.1 2003/05/07 10:01:14 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/lib/table/UserGroupMapping.php,v $ */

//table name goes here
$_tn  = 'UserGroupMapping';

$_t['UserGroupMappingID']['isid'] = TRUE;

$_t['UserID']['longname'] = 'User';
$_t['UserID']['datatype'] = 'VARCHAR';
$_t['UserID']['inputtype'] = 'select';
$_t['UserID']['ishidden'] = FALSE;
$_t['UserID']['keyto'] = 'Users.UserLogin';

$_t['GroupID']['longname'] = 'Group';
$_t['GroupID']['datatype'] = 'VARCHAR';
$_t['GroupID']['inputtype'] = 'select';
$_t['GroupID']['ishidden'] = FALSE;
$_t['GroupID']['keyto'] = 'Groups.GroupCode';

$_t['_view_sql'] = 'SELECT __KEY__ UserLogin, GroupName FROM Users JOIN __TABLE__ USING (UserID) JOIN Groups USING (GroupID)';
$_t['_view_cols'] = array('UserID','GroupID');

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
