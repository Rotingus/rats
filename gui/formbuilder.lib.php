<?php
/* $Id: formbuilder.lib.php,v 1.2 2003/05/29 04:02:25 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/gui/formbuilder.lib.php,v $ */

function idstr_query($idfield,$idstr,$idfrom) {
    $query = 'SELECT '.$idfield.', '.$idstr.' FROM '.$idfrom;
    return $query;
}

function fieldName($tableName,$element) {
    return $tableName.'[\''.$element.'\']';
}

function formelement_select($tableName,$tableData,$element,$data) { 
    $item = $tableData[$tableName][$element];
    $options = array();
    switch($item['datatype']) {
        case 'ENUM': $options = $item['enumvalues'];  break;
        case 'ID': $q = idstr_query($element,$item['keyto'],$item['keytable']); $options = MySQL_associativearray($q); break;
        default: die('Unknown select type ('.$item['datatype'].')'); break;
    }
    $v = '';
    if($data !== NULL) {
        $v = $data[$element];
    }
    echo selectinput(fieldName($tableName,$element),$options,$v);
}

function formelement_dateselect($tableName,$tableData,$element,$data) { 
}

function formelement_text($tableName,$tableData,$element,$data) { 
    $item = $tableData[$tableName][$element];
    $v = '';
    if($data !== NULL) {
        $v = $data[$element];
    }
    echo textinput(fieldName($tableName,$element),$v,40);
}

function formelement_textarea($tableName,$tableData,$element,$data) { 
    $item = $tableData[$tableName][$element];
    $v = '';
    if($data !== NULL) {
        $v = $data[$element];
    }
    echo textareainput(fieldName($tableName,$element),$v,80,50);
}

function formelement_null($tableName,$tableData,$element,$data) { 
}

function formelement ($tableName,$tableData,$element,$data = NULL) {
    $item = $tableData[$tableName][$element];
    echo '<tr><td><label for="'.fieldName($tableName,$element).'">'.$item['longname'].'</label></td>';
    echo '<td>';
    switch($item['inputtype']) {
        case 'select': formelement_select($tableName,$tableData,$element,$data); break;
        case 'dateselect': formelement_dateselect($tableName,$tableData,$element,$data); break;
        case 'textarea': formelement_textarea($tableName,$tableData,$element,$data); break;
        case 'text': formelement_text($tableName,$tableData,$element,$data); break;
        case '': formelement_null($tableName,$tableData,$element,$data); break;
    }
    echo '</td></tr>';
}

?>
<?php
foreach($tableData[$tableName]['_view_cols'] as $itemkey) {
    formelement($tableName,$tableData,$itemkey);
}

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
