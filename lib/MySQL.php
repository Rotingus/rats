<?php
/* $Id: MySQL.php,v 1.18 2003/07/17 20:27:43 robbat2 Exp $ */

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
            mysql_select_db($this->mysql_db,$this->getConnection());
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
        return $this->row_count;
    }
    function _getNumRows() {
        $num = @mysql_num_rows($this->getResult());
        $this->checkerror();
        return $num;
    }

    function getNumAffectedRows() {
        return $this->affected_row_count;
    }

    function _getNumAffectedRows() {
        $num = @mysql_affected_rows($this->getConnection());
        $this->checkerror();
        return $num;
    }
    
    function getInsertID() {
        return $this->insert_id;
    }
    
    function getQueryInfo() {
        return $this->query_info;
    }
    
    function _getQueryInfo() {
        // This _should_ be the top line, but it is broken in up to and including PHP4.3.2
        // As a result, output might be slightly wrong sometimes
        //$num = @mysql_info($this->getConnection());
        $num = mysql_info();
        $this->checkerror();
        return $num;
    }
    function _getInsertID() {
        $num = @mysql_insert_id($this->getConnection());
        $this->checkerror();
        return $num;
    }

    function &getRow($mode = MYSQL_NUM) {
        $row = mysql_fetch_array($this->getResult(),$mode);
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
        //@mysql_ping($this->getConnection());
        $this->mysql_result = mysql_query($query,$this->getConnection());
        $this->row_count = $this->_getNumRows();
        $this->affected_row_count = $this->_getNumAffectedRows();
        $this->query_info = $this->_getQueryInfo();
        $this->insert_id = $this->_getInsertID();
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

function MySQL_singletonassoc($query,$abort = -1) {
    $r = _MySQL_queryhelper($query);
    global $MySQL_singleton_abort;
    if($r->getNumRows() == 1) {
        $arr = $r->getRow(MYSQL_ASSOC);
        $item = $arr;
    } else { // rows != 1
        if($abort == $MySQL_singleton_abort) {
            $item = $MySQL_singleton_abort;
        } else {
            $item = $abort;
        }
    }
    return $item;
}
function MySQL_singletonrow($query,$abort = -1) {
    $r = _MySQL_queryhelper($query);
    global $MySQL_singleton_abort;
    if($r->getNumRows() == 1) {
        $arr = $r->getRow();
        $item = $arr;
    } else { // rows != 1
        if($abort == $MySQL_singleton_abort) {
            $item = $MySQL_singleton_abort;
        } else {
            $item = $abort;
        }
    }
    return $item;
}

function MySQL_singleton($query,$abort = -1) {
    $res = MySQL_singletonrow($query,$abort);
    if(is_array($res)) {
        return $res[0];
    } else { //error
        return $res;
    }
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
        $val = $tmp[1];
        //array_shift($tmp);
        //$arr[$key] = $tmp;
        $arr[$key] = $val;
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

function MySQL_escape($str) {
    if(!is_string($str)) {
        echo '<br />Type: '.gettype($str);
        echo '<br />Input: ';
        print_r($str);
        echo "<br />\nBacktrace:<br />\n";
        print_r(debug_backtrace());
        die("Input is not a string! ".__FILE__." ".__LINE__);
    }
    return mysql_real_escape_string($str);
}
function MySQL_quote($str) {
    return '\''.MySQL_escape($str).'\'';
}

function MySQL_arrayToSequence($arr,$brackets = TRUE, $escape = TRUE,$order = NULL) {
    $size = count($arr);
    $s = '';
    if($size > 0) {
        if($brackets) { 
            $s .= '('; 
        }
        for($i = 0; $i < $size; $i++) {
            if($order !== NULL) {
                $key = $order[$i];
            } else {
                $key = $i;
            }
            
            if($escape) {
                $s .= MySQL_quote($arr[$key]);
            } else {
                $s .= $arr[$key];
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
