<?php
/* $Id: view.php,v 1.11 2004/06/08 13:39:31 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/view.php,v $ */

include './header.inc.php';

$perm = 'view';

include 'lib/commontable.inc.php';

function drawTable_top($head) {
    echo html_table_open('',array('border'=>'1','cellspacing'=>'1','cellpadding'=>'1'));
    echo html_thead_open();
    echo html_tr_open();
    foreach($head as $h) {
        if($h != '') {
            echo html_th_wrap($h);
        }
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
        //$key = array_shift($row);
        $key = $row[0];
    } else {
        $key = '';
    }
    foreach($row as $r) {
        if(empty($r))
            $r = '<i>NULL</i>';
        $r = nl2br($r);
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
    //echo $query;
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

function drawTableTopSQL($table,$oldwhere='',$tablename='') {
    $keylist = array(''=>'');
    foreach($table as $key => $data) {
        if($key[0] != '_') 
            $keylist[$key] = $data['longname'];
    }
    echo '<form action="view.php" method="POST" class="title">';
    echo hiddeninput('table',$tablename);
    echo html_form_label('orderbycol','Sort:');
    echo selectinput('orderbycol',$keylist);
    echo html_form_label('wherecol','Search:');
    echo selectinput('wherecol',$keylist);
    $searchtypes = array('substring'=>'Substring','sqlregex'=>'SQL Regex','gnuregex'=>'GNU Regex');
    echo selectinput('wherefunc',$searchtypes);
    echo textinput('wheredata','',16);
    echo hiddeninput('wherecurrent',$oldwhere);
    echo submitinput('refresh','Refresh');
    echo '</form>';
}

if($tablePerm['view']) {
 global $tableData;
 $orderby = v('orderbycol','');
 $wherecol = v('wherecol','');
 $wherefunc = v('wherefunc','');
 $wheredata = v('wheredata','');
 $wherecurrent = v('wherecurrent','');
 if($orderby != '') {
      $orderby = ' ORDER BY '.$tableName.'.'.$orderby;
 }
 if($wherecol != '' && $wherefunc != '') {
     if($wherecurrent != '') {
         $newwhere = $wherecurrent . ' AND ';
     } else {
         $newwhere = '';
     }
     $s = '';
     switch($wherefunc) {
         case 'substring' : $s = $tableName.'.'.$wherecol . ' LIKE ' . MySQL_quote('%'.$wheredata.'%'); break;
         case 'sqlregex' : $s = $tableName.'.'.$wherecol . ' LIKE ' . MySQL_quote($wheredata); break;
         case 'gnuregex' : $s = $tableName.'.'.$wherecol . ' REGEX ' . MySQL_quote($wheredata); break;
     }
     $newwhere .= $s;
 } else  {
     $newwhere = $wherecurrent;
 }
 if($newwhere != '') {
     $where = ' WHERE '.$newwhere;
 } else {
     $where = '';
 }

 $query = $tableData[$tableName]['_view_sql_final'].$where.$orderby;
 if(dodbg(2)) echo "Query: ".$query ; 
 $headtmp = array_subkey($tableData[$tableName],'longname');
 $head = array();
 foreach($headtmp as $key => $value) {
     if($key[0] != '_') {
         $head[$key] = $value;
     }
 }
 drawTableTopSQL($tableData[$tableName],$newwhere,$tableName);
 drawTableSQL($head,$query,TRUE,$tableName,$tablePerm['edit'],$tablePerm['delete']);
}

include './footer.inc.php';

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
