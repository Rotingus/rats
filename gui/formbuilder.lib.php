<?php
/* $Id: formbuilder.lib.php,v 1.3 2003/06/03 19:50:40 robbat2 Exp $ */
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
    $item = $tableData[$tableName][$element];
    $v = '';
    if($data !== NULL) {
        $v = $data[$element];
    }
    echo dateselect(fieldName($tableName,$element),$v);
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

function seq($start,$increment='bad',$end='bad') {
    if($end == 'bad' && $increment == 'bad') {
        $end = $start;
        $increment = 1;
    } elseif ($end == 'bad') {
        $end = $increment;
        $increment = 1;
    }
    if($increment == 0) {
        die('Not looking infinitely.');
    }
    $a = array();
    for($i = $start; $i <= $end; $i += $increment) {
        $a[] = $i;
    }
    return $a;
}

function dateselect($name,$val=0) {
    if($val == 0 || $val == '' || $val === NULL) {
        $val = time();
    }
    $months = array( 01=>'Jan', 02=>'Feb', 03=>'Mar', 04=>'Apr', 05=>'May', 06=>'Jun', 07=>'Jul', 08=>'Aug', 09=>'Sep', 10=>'Oct', 11=>'Nov', 12=>'Dec');

    $arr = array(
    'year' => array('dstr'=>'Y','str'=>'%.4d','low'=>1997,'high'=>2005,'prefix'=>'','suffix'=>'-'),
    'month' => array('dstr'=>'m','str'=>'%.3s','low'=>0,'high'=>12,'index'=>$months,'prefix'=>'','suffix'=>'-'),
    'day' => array('dstr'=>'d','str'=>'%.2d','low'=>0,'high'=>31,'prefix'=>'','suffix'=>' at '),
    'hour' => array('dstr'=>'H','str'=>'%.2d','low'=>0,'high'=>23,'prefix'=>'','suffix'=>':'),
    'minute' => array('dstr'=>'i','str'=>'%.2d','low'=>0,'high'=>59,'prefix'=>'','suffix'=>':'),
    'second' => array('dstr'=>'s','str'=>'%.2d','low'=>0,'high'=>59,'prefix'=>'','suffix'=>'')
    );
    foreach($arr as $key=>$data) {
        $arr[$key]['current'] = date($data['dstr'],$val);
        $arr[$key]['values'] = seq($arr[$key]['low'],$arr[$key]['high']);
    }
    $str = '';
    foreach($arr as $key=>$data) {
        if(isset($data['index'])) {
            $v = $data['index'];
        } else {
            $v = array();
            foreach($data['values'] as $d) {
                $v[$d] = sprintf($data['str'],$d);
            }
        }
        $str .= $data['prefix'].selectinput(fieldName($name,$key),$v,$data['current']).$data['suffix'];
    }
    return $str;
}

foreach($tableData[$tableName]['_view_cols'] as $itemkey) {
    formelement($tableName,$tableData,$itemkey);
}

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
