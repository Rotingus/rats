<?php
/* $Id: Groups.php,v 1.3 2003/05/06 20:58:59 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/lib/table/Groups.php,v $ */

//table name goes here
$_tn  = 'Groups';

/*
$_t['field']['longname'] = '';
$_t['field']['datatype'] = '';
$_t['field']['inputtype'] = '';
$_t['field']['locked'] = '';
$_t['field']['hidden'] = '';
*/

$_t['GroupID']['isid'] = TRUE;

$_t['GroupName']['longname'] = 'Group Name';
$_t['GroupName']['datatype'] = 'VARCHAR';
$_t['GroupName']['inputtype'] = 'text';
$_t['GroupName']['ishidden'] = FALSE;

$_t['_view_cols'] = array('GroupName');

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
