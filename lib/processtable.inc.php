<?php
/* $Id: processtable.inc.php,v 1.5 2003/06/05 22:33:29 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/lib/processtable.inc.php,v $ */

// code goes here
$_t = array();
$_t['_view_sql'] = 'SELECT __KEY__ __COLUMNS__ FROM __TABLE__';
$GenericTableEnum = array('Actions', 'Bookings', 'CheckOuts', 'GroupActionMapping', 'Groups', 'Vendors', 'Notes', 'Objects', 'ObjectTypes', 'Purchases', 'Users', 'UserGroupMapping', 'Transactions');
$ActionTypeEnum = array('add', 'edit', 'delete', 'view');

include './lib/table/'.$tableName.'.php';


$defaultValues = array(
        'longname'  => '',
        'datatype'  => '',
        'inputtype' => '',
        'islocked ' => FALSE,
        'ishidden'  => TRUE,
        'isid'      => FALSE,
        'keyto'     => '',
        'keytable'     => '',
        'enumvalues' => array()
        );
foreach($_t as $key => $arr) {
    if($key[0] != '_') {
        foreach($defaultValues as $subkey => $value) {
            if(!isset($_t[$key][$subkey])) {
                $_t[$key][$subkey] = $value; 
            }
        }
        if($_t[$key]['isid'] && $_t[$key]['longname']=='') {
            $_t[$key]['longname']='ID';
        }
    }
}
global $tableData;
$_t['_name'] = $_tn;

$tableData[$_tn] = $_t;
$tableName = $_tn;

// pre-process
$query = $tableData[$tableName]['_view_sql'];
$tableKey = '';
foreach($tableData[$tableName] as $key => $data) {
    if(isset($data['isid']) && ($data['isid'] == TRUE) && ($key[0] != '_')) {
        if($tableKey != '') {
            die('Multiple table keys on '.$tableName.' ('.$tableKey.','.$key.')');
        } else {
            $tableKey = $key;
        }
    }
}
$_t['_idkey'] = $tableKey;
if($tableKey != '') {
    $tableKey .= ',';
}
$arr_srch = array('__TABLE__','__COLUMNS__','__KEY__');
$arr_repl_final = array($tableName,array2commasep($tableData[$tableName]['_view_cols']),$tableKey);
$arr_repl_all = array($tableName,'*','');
$finalquery = str_replace($arr_srch,$arr_repl_final,$query);
$allquery = str_replace($arr_srch,$arr_repl_all,'SELECT __COLUMNS__ FROM __TABLE__');
$_t['_view_sql_final'] = $finalquery;
$_t['_view_sql_all'] = $allquery;
$query = 'INSERT INTO __TABLE__ (__COLUMNS__) VALUES __VALUES__';
$insertquery = str_replace($arr_srch,$arr_repl_final,$query);
$_t['_insert_sql'] = $insertquery;
$tableData[$_tn] = $_t;

// DEBUG
print_r($tableData);
echo '<br />';


/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
