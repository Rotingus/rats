<?php
/* $Id: formbuilder.lib.php,v 1.5 2003/06/22 23:08:09 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/gui/formbuilder.lib.php,v $ */

function idstr_query($idfield,$idstr,$idfrom) {
    $query = 'SELECT '.$idfield.', '.$idstr.' FROM '.$idfrom;
    return $query;
}

function fieldName($tableName,$element) {
    return $tableName.'['.$element.']';
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
function formelement_durationselect($tableName,$tableData,$element,$data) {
    $item = $tableData[$tableName][$element];
    $v = '';
    if($data !== NULL) {
        $v = $data[$element];
    }
    echo dateselect(fieldName($tableName,$element),$v,TRUE);
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
        case 'durationselect': formelement_durationselect($tableName,$tableData,$element,$data); break;
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

function dateselect($name,$val=0,$duration = FALSE) {
    if($val == 0 || $val == '' || $val === NULL) {
        $val = time();
    }
    $months = array( 01=>'Jan', 02=>'Feb', 03=>'Mar', 04=>'Apr', 05=>'May', 06=>'Jun', 07=>'Jul', 08=>'Aug', 09=>'Sep', 10=>'Oct', 11=>'Nov', 12=>'Dec');
    $arr = array(
    'year' => array('dstr'=>'Y','str'=>'%.4d','low'=>1997,'high'=>2005,'suffix'=>'-'),
    'month' => array('dstr'=>'m','str'=>'%.3s','high'=>12,'index'=>$months,'suffix'=>'-'),
    'day' => array('dstr'=>'d','high'=>31,'suffix'=>' at ','def'=>14),
    'hour' => array('dstr'=>'H','high'=>23,'suffix'=>':'),
    'minute' => array('dstr'=>'i','high'=>59,'suffix'=>':'),
    'second' => array('dstr'=>'s','high'=>59)
    );
    if($duration) {
        $arr['year']['low'] = 0;
        $arr['year']['high'] = 1;
    }
    $defaultelem = array('dstr'=>'','str'=>'%.2d','low'=>0,'high'=>5,'prefix'=>'','suffix'=>'','def'=>0);
    foreach($arr as $key=>$data) {
        $arr[$key] = array_merge($defaultelem,$arr[$key]);
    }
    foreach($arr as $key=>$data) {
        if(!$duration) {
            $arr[$key]['current'] = date($data['dstr'],$val);
        } else {
            $arr[$key]['current'] = $arr[$key]['def'];
            unset($arr[$key]['index']);
        }
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
    if(!$duration) {
        $str .= '(YYYY-MMM-DD HH-MM-SS)';
    } else {
        $str .= '(YYYY-MM-DD HH-MM-SS) [duration]';
    }
    return $str;
}

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
