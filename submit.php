<?php
/* $Id: submit.php,v 1.4 2003/07/16 10:08:51 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/submit.php,v $ */

include './header.inc.php';

$perm = v('perm','add');
echo 'Perm: '.$perm."<br />\n";

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
        $tableEdit = v('table');
        $dataEdit = v($tableEdit);
        $idEdit = $dataEdit[$tableData[$tableName]['_idkey']];
        if(dodbg()) {
            echo "Trying to sequence:<br />\n";
            print_r($tableData[$tableName]['_view_cols']);
            echo "<br />\nEnd of attempt.\n<br />";
        }
        $cols = MySQL_arrayToSequence($tableData[$tableName]['_view_cols'],FALSE,FALSE);
        if(dodbg()) { 
            echo "sequence:";
            print_r($cols);
        }
        if(empty($tableData[$tableName]['_idkey'])) {
            die("Trying to edit a table $tableName without any ID key!\n");
        }
        $query = $tableData[$tableName]['_view_sql_all'].' WHERE '.$tableData[$tableName]['_idkey'].'='.MySQL_quote($idEdit);
        if(dodbg()) echo "Query: $query<br />\n";
        global $MySQL_singleton_abort;
        $oldEditData = MySQL_singletonassoc($query);
        if($oldEditData === $MySQL_singleton_abort) {
            die("Data abort! Query: $query\n");
        }
        $changequery = '';
        $first = TRUE;
        foreach($dataEdit as $dataKey_key => $dataKey_value ) {
            // skip old data
            if(dodbg(4)) {
                echo 'OLD: '.$oldEditData[$dataKey_key]."<br />\n";
                echo 'NEW: '.$dataKey_value."<br />\n";
            }
            if($oldEditData[$dataKey_key] !== $dataKey_value) {
                $changequery .= ($first ? '' : ', ').$dataKey_key.'='.MySQL_quote($dataKey_value);
                if($first) $first = FALSE;
            }
        }
        // build query
        $query = 'UPDATE '.$tableName.' SET '.$changequery.' WHERE '.$tableData[$tableName]['_idkey'].'='.$idEdit;
        if(dodbg()) echo 'Query: '.$query."<br />\n";
        if(empty($changequery)) {
            $_SESSION['msg'] = 'No changes made in data';
        } else {
            $_SESSION['msg'] = 'Changes in '.$tableName.' processed.';
            $res = _MySQL_queryhelper($query);
        }

        if(!dodbg()) { 
            httpredirect('view.php?table='.$tableName);
        } else {
            echo 'MSG: '.$_SESSION['msg']."<br />\n";
            die;
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
    if(dodbg(2)) { echo "Data is:<br />\n"; print_r($data); echo "<br />\nEnd of Data<br />\n";}
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
    } else {
        echo 'MSG: '.$_SESSION['msg']."<br />\n";
    }
    // TODO
} else {
    echo __FILE__.' permission denied';
}

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
