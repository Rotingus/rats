<?php
/* $Id: view.php,v 1.2 2003/03/15 00:22:50 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/view.php,v $ */

include './header.inc.php';

$perm = 'view';

include 'lib/commontable.inc.php';

function drawTable_top($head) {
    echo html_table_open('',array('border'=>'1','cellspacing'=>'1','cellpadding'=>'1'));
    echo html_thead_open();
    echo html_tr_open();
    foreach($head as $h) {
        echo html_th_open();
        echo($h);
        echo html_th_close();
    }
    echo html_tr_close();
    echo html_thead_close();
    echo '<br />'."\n";
}

function drawTable_bottom() {
    echo html_table_close();
}

function drawTable_row($row) {
    foreach($row as $r) {
        echo html_td_open();
        echo($r);
        echo html_td_close();
    }
}

function drawTable($head,$data) {
    drawTable_top($head);
    foreach($data as $row) {
        echo html_tr_open();
        drawTable_row($row);
        echo html_tr_close();
        echo '<br />'."\n";
    }
    drawTable_bottom();
}

function drawTableSQL($head,$query) {
    global $_MySQL;
    echo $query;
    drawTable_top($head);
    $_MySQL->restart();
    $_MySQL->query($query);
    while($row = $_MySQL->getRow()) {
        echo html_tr_open();
        drawTable_row($row);
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

if($validPermissions) {
 global $tableData;
 $query = $tableData[$tableName]['_view_sql'];
 $arr_srch = array('__TABLE__','__COLUMNS__');
 $arr_repl = array($tableName,array2commasep($tableData[$tableName]['_view_cols']));
 $query = str_replace($arr_srch,$arr_repl,$query);
 $head = array_subkey($tableData[$tableName],'longname');
 drawTableSQL($head,$query);
}

include './footer.inc.php';

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
