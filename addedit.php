<?php
/* $Id: addedit.php,v 1.7 2004/06/08 15:17:19 mdeepwel Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/addedit.php,v $ */

include './header.inc.php';

$perm = v('perm','add');

include 'lib/commontable.inc.php';

if($tablePerm[$perm]) {
?>
<form action="submit.php" method="POST" class="dataform">
<?php
$editData = NULL;
if($perm == 'edit') {
    $idEdit = v('id');
    $tableEdit = v('table');
    $cols = MySQL_arrayToSequence($tableData[$tableName]['_view_cols'],FALSE,FALSE);
    if(empty($tableData[$tableName]['_idkey'])) {
        die("Trying to edit a table $tableName without any ID key!\n");
    }
    $query = $tableData[$tableName]['_view_sql_all'].' WHERE '.$tableData[$tableName]['_idkey'].'='.MySQL_quote($idEdit);
    if(dodbg()) echo 'Query: '.$query."<br />\n";
    global $MySQL_singleton_abort;
    $editData = MySQL_singletonassoc($query);
    if($editData === $MySQL_singleton_abort) {
        die("Data abort! Query: $query\n");
    }
    echo hiddeninput(fieldName($tableName,$tableData[$tableName]['_idkey']),$idEdit);
}
echo hiddeninput('table',$tableName);
echo hiddeninput('perm',$perm);
echo "\n";
?>
<table class="dataform">
<?php
$data = NULL;
if($editData !== NULL) {
    $data = $editData;
}
foreach($tableData[$tableName]['_view_cols'] as $itemkey) {
    formelement($tableName,$tableData,$itemkey,$data);
}
?>
</table>
<?php
echo submitinput('submit','Submit')."\n";
?>
</form>
<?php
    //TODO
} else {
    
    echo __FILE__.' permission denied';
}

include './footer.inc.php';

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
