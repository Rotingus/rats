<?php
/* $Id: MySQL.php,v 1.11 2003/05/07 19:57:20 robbat2 Exp $ */

//var $mysql_conn;

class MySQL {
    //local handle
    var $mysql_conn;

    //input data
    var $mysql_server = 'localhost:/tmp/mysql.sock';
    var $mysql_username = 'rats';
    var $mysql_passwd = 'ratty';
    var $mysql_db = 'rats';
    var $using_transactions = false;

    //status
    var $in_transaction = false;

    //return data
    var $mysql_result = false;
    var $querybuffer = array();
    var $row_count = -1;
    var $row_current = 0;

    function MySQL($mysql_username = '',$mysql_passwd = '',$mysql_db = '',$mysql_server = '',$using_transactions = false) {
        $this->mysql_username = $mysql_username;
        $this->mysql_passwd = $mysql_passwd;
        $this->mysql_server = $mysql_server;
        $this->mysql_db = $mysql_db;
        $this->using_transactions = $using_transactions;
        $this->connect();
    }
    
    function connect() {
        if(!$this->mysql_conn) {
            $conn =& mysql_connect($this->mysql_server,$this->mysql_username,$this->mysql_passwd);
            $this->checkerror();
            $this->mysql_conn =& $conn;
            //mysql_select_db($this->mysql_conn,$this->mysql_db);
            mysql_select_db($this->mysql_db);
            $this->checkerror();
        }
    }

    function close() {
        if($this->getConnection()) {
            mysql_close($this->getConnection());
        }
    }

    function start() {
        $this->bufferReset();
        if($this->using_transactions) {
            //$this->bufferAdd('SET AUTOCOMMIT=0');
            $this->bufferAdd('BEGIN');
        }
    }

    function commit() {
        if($this->using_transactions) {
            $this->bufferAdd('COMMIT');
        }
    }

    function rollback() {
        if($this->using_transactions) {
            $this->bufferAdd('ROLLBACK');
        }
    }

    function run($query) {
        $this->bufferAdd($query);
    }

    function execute() {
        $this->commit();
        foreach($this->querybuffer as $line) {
            $this->query($line);
        }
        $this->start();
    }

    function checkerror() {
        if(mysql_errno() != 0) {
            die(mysql_error());
        }
    }

    function getNumRows() {
        //$num = mysql_num_rows($this->getResult());
        //$this->checkerror();
        $num = $this->row_count;
        return $num;
    }
    function _getNumRows() {
        $num = @mysql_num_rows($this->getResult());
        $this->checkerror();
        return $num;
    }

    function &getRow() {
        $row = mysql_fetch_row($this->getResult());
        $this->row_current++;
        $this->checkerror();
        return $row;
    }

    function hasRows() {
        $num = $this->getNumRows();
        return $this->row_current < $this->row_count;
    }

    function &getResult() {
        return $this->mysql_result;
    }

    function &getConnection() {
        return $this->mysql_conn;
    }

    function query($query) {
        //echo $query;
        //flush();
        //ob_flush();
        $this->mysql_result = mysql_query($query);
        $this->row_count = $this->_getNumRows();
        $this->row_current = 0;
        $this->checkerror();
    }

    function bufferAdd($newquery) {
        $this->querybuffer[] = $newquery;
    }

    function bufferReset() {
        $this->querybuffer = array();
    }

    function restart() {
        $this->mysql_result = false;
        $this->bufferReset();
    }
} //end of MySQL class

global $MySQL_singleton_abort;
$MySQL_singleton_abort = -1;

function MySQL_singleton($query,$abort = -1) {
    $r = _MySQL_queryhelper($query);
    global $MySQL_singleton_abort;
    if($r->getNumRows() == 1) {
        $arr = $r->getRow();
        $item = $arr[0];
    } else { // rows != 1
        if($abort == $MySQL_singleton_abort) {
            $item = $MySQL_singleton_abort;
        } else {
            $item = $abort;
        }
    }
    return $item;
}

function MySQL_singletonarray($query) {
    $r = _MySQL_queryhelper($query);
    $arr = array();
    while($r->hasRows()) {
        $tmp = $r->getRow();
        if(count($tmp) > 1) die("Non-singleton results in singleton query!");
        $arr[] = $tmp[0];
    }
    return $arr;
}
function MySQL_associativearray($query) {
    $r = _MySQL_queryhelper($query);
    $arr = array();
    while($r->hasRows()) {
        $tmp = $r->getRow();
        if(count($tmp) < 2) die("Non-associative results in associative query!");
        $key = $tmp[0];
        array_shift($tmp);
        $arr[$key] = $tmp;
    }
    return $arr;
}
function MySQL_associativesingleton($query) {
    $r = _MySQL_queryhelper($query);
    $arr = array();
    while($r->hasRows()) {
        $tmp = $r->getRow();
        if(count($tmp) != 2) die("Incorrect result quantity in associative singleton query!");
        $arr[$tmp[0]] = $tmp[1];
    }
    return $arr;
}

function _MySQL_queryhelper($query) {
    global $_MySQL;
    $_MySQL->restart();
    $_MySQL->query($query);
    return $_MySQL;
}

function MySQL_buildonemanykey($keyName,$values) {
    $str = '`'.$keyName.'` ';
    if(is_array($values)) {
        $str .= ' IN '.MySQL_arrayToSequence($values);
    } else {
        $str .= '='.MySQL_quote($values);
    }
    return $str;
}

function MySQL_quote($str) {
    return '\''.MySQL_escape($str).'\'';
}
function MySQL_escape($str) {
    return mysql_real_escape_string($str);
}

function MySQL_arrayToSequence($arr,$brackets = TRUE, $escape = TRUE) {
    $size = count($arr);
    $s = '';
    if($size > 0) {
        if($brackets) { 
            $s .= '('; 
        }
        for($i = 0; $i < $size; $i++) {
            if($escape) {
                $s .= MySQL_quote($arr[$i]);
            } else {
                $s .= $arr[$i];
            }
            if($i+1 < $size) {
                $s .= ',';
            }
        }
        if($brackets) { 
            $s .= ')'; 
        }
    }
    return $s;
}

$username = 'rats';
$passwd = 'ratty';
$db = 'rats';
$server = 'localhost:/tmp/mysql.sock';

global $_MySQL,$_MySQL_trans;
$_MySQL = new MySQL($username,$passwd,$db,$server,false);
$_MySQL_trans = new MySQL($username,$passwd,$db,$server,true);

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
