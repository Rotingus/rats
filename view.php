<?php
/* $Id: view.php,v 1.4 2003/05/06 21:53:51 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/view.php,v $ */

include './header.inc.php';

$perm = 'view';

include 'lib/commontable.inc.php';

function drawTable_top($head) {
    echo html_table_open('',array('border'=>'1','cellspacing'=>'1','cellpadding'=>'1'));
    echo html_thead_open();
    echo html_tr_open();
    foreach($head as $h) {
        if($h != '')
            echo html_th_wrap($h);
    }
    echo html_tr_close();
    echo html_thead_close();
    echo '<br />'."\n";
}

function drawTable_bottom() {
    echo html_table_close();
}

function drawTable_row($row,$hasKey = FALSE, $table = '', $showEdit = FALSE, $showDelete = FALSE) {
    if($hasKey) {
        $key = array_shift($row);
    } else {
        $key = '';
    }
    foreach($row as $r) {
        if($r == '')
            $r = '<i>NULL</i>';
        echo html_td_wrap($r);
    }
    if($hasKey && $table != '') {
        if($showEdit) {
            echo html_td_wrap(guiEdit($table,$key));
        }
        if($showDelete) {
            echo html_td_wrap(guiDelete($table,$key));
        }
    }
}

function drawTable($head, $data, $hasKey = FALSE, $table = '', $showEdit = FALSE, $showDelete = FALSE) {
    drawTable_top($head);
    foreach($data as $row) {
        echo html_tr_open();
        drawTable_row($row, $hasKey, $table, $showEdit, $showDelete);
        echo html_tr_close();
        echo '<br />'."\n";
    }
    drawTable_bottom();
}

function drawTableSQL($head,$query, $hasKey = FALSE, $table = '', $showEdit = FALSE, $showDelete = FALSE) {
    global $_MySQL;
    echo $query;
    drawTable_top($head);
    $_MySQL->restart();
    $_MySQL->query($query);
    while($row = $_MySQL->getRow()) {
        echo html_tr_open();
        drawTable_row($row, $hasKey, $table, $showEdit, $showDelete);
        echo html_tr_close();
    }
    drawTable_bottom();
}

function array2commasep($arr) {
    $s = '';
    for($i = 0; $i < count($arr); $i++) {
        $s .= ' '.$arr[$i];
        if($i+1 < count($arr)) {
            $s .= ',';
        }
    }
    return $s;
}

function array_subkey($arr,$k2) {
    $newarr = array();
    while(list($k1,$v1) = each($arr)) {
        if(isset($v1[$k2])) {
            $newarr[$k1] = $v1[$k2];
        }
    }
    return $newarr;
}

if($tablePerm['view']) {
 global $tableData;
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
 if($tableKey != '') {
     $tableKey .= ',';
 }
 $arr_srch = array('__TABLE__','__COLUMNS__','__KEY__');
 $arr_repl = array($tableName,array2commasep($tableData[$tableName]['_view_cols']),$tableKey);
 $query = str_replace($arr_srch,$arr_repl,$query);
 $headtmp = array_subkey($tableData[$tableName],'longname');
 $head = array();
 foreach($headtmp as $key => $value) {
     if($key[0] != '_') {
         $head[$key] = $value;
     }
 }
 drawTableSQL($head,$query,TRUE,$tableName,$tablePerm['edit'],$tablePerm['delete']);
}

include './footer.inc.php';

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
