<?php
/* $Id: processtable.inc.php,v 1.1 2003/04/30 18:16:29 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/lib/processtable.inc.php,v $ */

// code goes here
$_t = array();
$_t['_view_sql'] = 'SELECT __KEY__ __COLUMNS__ FROM __TABLE__';
include './lib/table/'.$tableName.'.php';

$defaultValues = array(
        'longname'  => '',
        'datatype'  => '',
        'inputtype' => '',
        'islocked ' => FALSE,
        'ishidden'  => TRUE,
        'isid'      => FALSE,
        'keyto'     => ''
        );
foreach($_t as $key => $arr) {
    if($key[0] != '_') {
        foreach($defaultValues as $subkey => $value) {
            if(!isset($_t[$key][$subkey])) {
                $_t[$key][$subkey] = $value; 
            }
        }
    }
}
global $tableData;
$_t['_name'] = $_tn;
$tableData[$_tn] = $_t;
print_r($tableData);


/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
