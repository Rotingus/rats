<?php
/* $Id: submit.php,v 1.1 2003/06/05 23:22:18 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/submit.php,v $ */

include './header.inc.php';

$perm = v('perm','add');

include 'lib/commontable.inc.php';

if($tablePerm[$perm]) {
$editData = NULL;
if($perm == 'edit') {
    $idEdit = v('id');
    $tableEdit = v('table');
    $cols = MySQL_arrayToSequence($tableData[$tableName]['_view_cols'],FALSE,FALSE);
    if(empty($tableData[$tableName]['_idkey'])) {
        die("Trying to edit a table $tableName without any ID key!\n");
    }
    $query = $tableData[$tableName]['_view_sql_all'].' WHERE '.$tableData[$tableName]['_idkey'].'='.MySQL_quote($idEdit);
    echo "Query: $query\n";
    global $MySQL_singleton_abort;
    $editData = MySQL_singletonassoc($query);
    if($editData === $MySQL_singleton_abort) {
        die("Data abort! Query: $query\n");
    }
}
if(isset($idEdit)) {
    echo 'id'.$idEdit."\n";
}
echo 'table'.$tableName."\n";
echo 'mode'.$perm."\n";
$data = NULL;
foreach($tableData[$tableName]['_view_cols'] as $itemkey) {
    if($editData !== NULL) {
        $data = $editData[$itemkey];
    }
    //formelement($tableName,$tableData,$itemkey,$data);
}
echo "<br /><br />Vars:<br />";
$data = get_defined_vars();
print_r($data);
echo "<br /><br /><br />";

$query = $tableData[$tableName]['_insert_sql'];
echo $tableName;
$data = v($tableName,NULL);
if($data === NULL) {
    die("No data found!");
}
print_r($data);
$query = str_replace('__VALUES__',MySQL_arrayToSequence($data,TRUE,TRUE,$tableData[$tableName]['_view_cols']),$query);
echo $query;
$res = _MySQL_queryhelper($query);

    // TODO
} else {
    echo __FILE__.' permission denied';
}

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
