<?php
/* $Id: GroupActionMapping.php,v 1.3 2003/05/29 03:50:22 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/lib/table/GroupActionMapping.php,v $ */

//table name goes here
$_tn  = 'GroupActionMapping';

$_t['GroupActionMappingID']['isid'] = TRUE;

$_t['GroupID']['longname'] = 'Group';
$_t['GroupID']['datatype'] = 'ID';
$_t['GroupID']['inputtype'] = 'select';
$_t['GroupID']['ishidden'] = FALSE;
$_t['GroupID']['keyto'] = 'GroupName';
$_t['GroupID']['keytable'] = 'Groups';

$_t['ActionID']['longname'] = 'Action';
$_t['ActionID']['datatype'] = 'ID';
$_t['ActionID']['inputtype'] = 'select';
$_t['ActionID']['ishidden'] = FALSE;
$_t['ActionID']['keyto'] = 'ActionCode';
$_t['ActionID']['keytable'] = 'Actions';

$_t['_view_sql'] = 'SELECT __KEY__ GroupName, CONCAT(ActionGenericTable,\'-\',ActionType) 
FROM Groups JOIN __TABLE__ USING (GroupID) JOIN Actions USING (ActionID)';
$_t['_view_cols'] = array('GroupID','ActionID');

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
