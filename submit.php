<?php
/* $Id: submit.php,v 1.2 2003/06/22 23:09:17 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/submit.php,v $ */

include './header.inc.php';

$perm = v('perm','add');

include 'lib/commontable.inc.php';

function processDate(&$datevar) {
    $tmp = $datevar['year'].'-'.$datevar['month'].'-'.$datevar['day'].' '.$datevar['hour'].':'.$datevar['minute'].':'.$datevar['second'];
    $datevar = $tmp;
    return $datevar;
}


if($tablePerm[$perm]) {
    $editData = NULL;
    
    // Fix dates first
    $arrkeys = array_keys($_REQUEST[$_REQUEST['table']]);
    $datekeys = array_values(preg_grep ("/Date$/", $arrkeys));
    foreach($datekeys as $dk) {
        processDate($_REQUEST[$_REQUEST['table']][$dk]);
    }
    unset($datekeys,$dk,$arrkeys);
    
    if($perm == 'edit') {
        $idEdit = v('id');
        $tableEdit = v('table');
        $cols = MySQL_arrayToSequence($tableData[$tableName]['_view_cols'],FALSE,FALSE);
        if(empty($tableData[$tableName]['_idkey'])) {
            die("Trying to edit a table $tableName without any ID key!\n");
        }
        $query = $tableData[$tableName]['_view_sql_all'].' WHERE '.$tableData[$tableName]['_idkey'].'='.MySQL_quote($idEdit);
        if(dodbg()) echo "Query: $query\n";
        global $MySQL_singleton_abort;
        $editData = MySQL_singletonassoc($query);
        if($editData === $MySQL_singleton_abort) {
            die("Data abort! Query: $query\n");
        }
    }
    if(isset($idEdit)) {
        if(dodbg()) echo 'id'.$idEdit."\n";
    }
    if(dodbg()) echo 'table'.$tableName."\n";
    if(dodbg()) echo 'mode'.$perm."\n";
    $data = NULL;
    foreach($tableData[$tableName]['_view_cols'] as $itemkey) {
        if($editData !== NULL) {
            $data = $editData[$itemkey];
        }
        //formelement($tableName,$tableData,$itemkey,$data);
    }
    if(dodbg(2)) {
        echo "<br /><br />Vars:<br />";
        $data = get_defined_vars();
        $unwanted = array('_GET','_POST','_COOKIE',
        '_SERVER','_ENV','_FILES',
        'HTTP_GET_VARS',
        'HTTP_ENV_VARS',
        'HTTP_POST_VARS',
        'HTTP_POST_FILES',
        'HTTP_SERVER_VARS',
        'HTTP_COOKIE_VARS',
        'HTTP_SESSION_VARS',);
        foreach($unwanted as $u) unset($data[$u]);
        print_r($data);
        echo "<br /><br /><br />";
    }

    $query = $tableData[$tableName]['_insert_sql'];
    if(dodbg()) echo $tableName;
    $data = v($tableName,NULL);
    if($data === NULL) {
        die("No data found!");
    }
    if(dodbg(2)) print_r($data);
    $query = str_replace('__VALUES__',MySQL_arrayToSequence($data,TRUE,TRUE,$tableData[$tableName]['_view_cols']),$query);
    if(dodbg()) echo $query;
    $res = _MySQL_queryhelper($query);

    if($perm = 'add') {
        $_SESSION['msg'] = 'Item added to '.$tableName;
    } else {
        $_SESSION['msg'] = 'Item edited in '.$tableName;
    }
    if(!dodbg()) { 
        httpredirect('view.php?table='.$tableName);
    }
    // TODO
} else {
    echo __FILE__.' permission denied';
}

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
