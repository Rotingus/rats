<?php
/* $Id: processtable.inc.php,v 1.3 2003/05/27 18:57:30 robbat2 Exp $ */
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
// DEBUG
print_r($tableData);
echo '<br />';


/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
