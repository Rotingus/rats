<?php
/* $Id: MySQL.php,v 1.3 2002/12/12 22:55:31 robbat2 Exp $ */

//var $mysql_conn;

class MySQL {
    var $mysql_conn;
    var $mysql_server = 'localhost:/tmp/mysql.sock';
    var $mysql_username = 'rats';
    var $mysql_passwd = 'ratty';
    var $mysql_db = 'rats';
    var $using_transactions = false;
    var $in_transaction = false;

    var $mysql_result = false;
    var $querybuffer = array();

    function MySQL($using_transactions = false) {
        $this->using_transactions = $using_transactions;
        $this->connect();
    }
    
    function connect() {
        if(!$this->mysql_conn) {
            $conn =& mysql_connect($this->mysql_server,$this->mysql_username,$this->mysql_passwd);
            $this->mysql_conn =& $conn;
            //mysql_select_db($this->mysql_conn,$this->mysql_db);
            mysql_select_db($this->mysql_db);
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

    function getNumRows() {
        return mysql_num_rows($this->getResult());
    }

    function &getRow() {
        return mysql_fetch_row($this->getResult());
    }

    function &getResult() {
        return $this->mysql_result;
    }

    function &getConnection() {
        return $this->mysql_conn;
    }

    function query($query) {
        echo 'Running SQL:'.$query."<br />\n";
        $this->mysql_result = mysql_query($query);
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

}

function MySQL_singleton($query,$abort = 0) {
    global $_MySQL;
    $_MySQL->restart();
    $_MySQL->query($query);
    $arr = $_MySQL->getRow();
    $item = $arr[0];
    if($_MySQL->getNumRows() != 1) {
        $item = $abort;
    }
    return $item;
}

function MySQL_quote($str) {
    return '\''.MySQL_escape($str).'\'';
}
function MySQL_escape($str) {
    return mysql_real_escape_string($str);
}

function MySQL_arrayToSequence($arr) {
    $size = count($arr);
    $s = '';
    if($size > 0) {
        $s = '(';
        for($i = 0; $i < $size; $i++) {
            $s .= $arr[$i];
            if($i+1 < $size) {
                $s .= ',';
            }
        }
        $s .= ')';
    }
    return $s;
}

global $_MySQL,$_MySQL_trans;
$_MySQL = new MySQL(false);
$_MySQL_trans = new MySQL(true);

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
