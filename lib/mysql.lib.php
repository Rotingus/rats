<?php
//foo  
function
get_mysql_query($query,
                $server,
                $user_name,
                $user_pwd,
                $base_name)
{
    $connection = mysql_connect($server, $user_name, $user_pwd);
    while ($connection == FALSE) {
        $connection = mysql_connect($server, $user_name, $user_pwd);
    }
    $db = mysql_select_db($base_name, $connection);
    $result = mysql_query($query);
    //$connection_close = mysql_close($connection);
    return $result;
}

function
mysqlquery($query)
{
    return get_mysql_query($query, 'localhost', 'rats', 'ratty',
                           'RATS');
}

function
importmysqldata($query)
{
    //query should return two columns, first is the value, second is the data
    $result = mysqlquery($query);
    $data = array();
    if ($result && mysql_num_rows($result) > 0) {
        while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
            if (count($row) == 2) {
                $data[$row[0]] = $row[1];
            } else if (count($row) == 1) {
                $data[] = $row[0];
            }
        }
    }
    return $data;
}

function
exportmysqldata($query)
{
    return mysqlquery($query);
}


function
ensureValues($table,
             $column,
             $data)
{
    $existingquery = 'SELECT '.$column.' FROM '.$table;
    $existingData = importmysqldata($existingquery);
    $missingData = array();
    for ($i = 0; $i < count($data); $i++) {
        if (!in_array($data[$i], $existingData)) {
            $missingData[] = $data[$i];
        }
    }
    $insertQuery =
        'INSERT IGNORE INTO '.$table.' ('.$column.') VALUES'.
        buildMySQLsingles($missingData);
    exportmysqldata($insertQuery);
}


function
buildMySQLsingles($arr,
                  $constarr = array())
{
    $constprefix = '(';
    $constsuffix = ')';
    for ($i = 0; $i < count($constarr); $i++) {
        $constprefix .= '\''.$constarr[$i].'\',';
    }
    $s = "";
    $first = true;
    foreach($arr as $data) {
        if (!$first) {
            $s .=  ', ';
        } else {
            $first = false;
        }
        $s .=  $constprefix.'\''.$data.'\''.$constsuffix;
    }
    return $s;
}

function
buildMySQLpairs($arr,
                $constarr = array())
{
    $constprefix = '(';
    $constsuffix = ')';
    for ($i = 0; $i < count($constarr); $i++) {
        $constprefix .=  '\''.$constarr[$i].'\',';
    }
    $s = "";
    $first = true;
    foreach($arr as $key  => $data) {
        if (!$first) {
            $s .=  ', ';
        } else {
            $first = false;
        }
        $s .=  $constprefix.'\''.$key.'\','.'\''.$data.'\''.$constsuffix;
    }
    return $s;
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


?>
