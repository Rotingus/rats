<?php
/* $Id: Notes.php,v 1.3 2003/05/27 18:57:30 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/lib/table/Notes.php,v $ */

//table name goes here
$_tn  = 'Notes';

/*
$_t['field']['longname'] = '';
$_t['field']['datatype'] = '';
$_t['field']['inputtype'] = '';
$_t['field']['islocked'] = FALSE;
$_t['field']['ishidden'] = TRUE;
$_t['field']['iskey'] = FALSE;
*/

$_t['NoteID']['isid'] = TRUE;

$_t['NoteMimeType']['longname'] = 'Mime-Type';
$_t['NoteMimeType']['datatype'] = 'VARCHAR';
$_t['NoteMimeType']['inputtype'] = 'text';
$_t['NoteMimeType']['ishidden'] = FALSE;
$_t['NoteMimeType']['islocked'] = TRUE;

$_t['NoteData']['longname'] = 'Data';
$_t['NoteData']['datatype'] = 'MEDIUMTEXT';
$_t['NoteData']['inputtype'] = 'text';
$_t['NoteData']['ishidden'] = FALSE;
$_t['NoteData']['islocked'] = TRUE;

$_t['NoteGenericTable']['longname'] = 'Table';
$_t['NoteGenericTable']['datatype'] = 'ENUM';
$_t['NoteGenericTable']['inputtype'] = 'select';
$_t['NoteGenericTable']['enumvalues'] = $genericTableEnum;
$_t['NoteGenericTable']['ishidden'] = FALSE;
$_t['NoteGenericTable']['islocked'] = TRUE;

$_t['NoteGenericID']['longname'] = 'ID';
$_t['NoteGenericID']['datatype'] = 'INT';
$_t['NoteGenericID']['inputtype'] = 'text';
$_t['NoteGenericID']['ishidden'] = FALSE;
$_t['NoteGenericID']['islocked'] = TRUE;

$_t['UserID']['longname'] = 'User';
$_t['UserID']['datatype'] = 'VARCHAR';
$_t['UserID']['inputtype'] = 'select';
$_t['UserID']['islocked'] = TRUE;
$_t['UserID']['ishidden'] = FALSE;
$_t['UserID']['keyto'] = 'Users.UserName';

$_t['NoteDate']['longname'] = 'Timestamp';
$_t['NoteDate']['datatype'] = 'TIMESTAMP';
$_t['NoteDate']['inputtype'] = 'dateselect';
$_t['NoteDate']['islocked'] = TRUE;
$_t['NoteDate']['ishidden'] = FALSE;

$_t['_view_cols'] = array('NoteDate','UserID','NoteGenericTable','NoteGenericID','NoteMimeType','NoteData');

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
