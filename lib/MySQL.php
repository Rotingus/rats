<?php
/* $Id: MySQL.php,v 1.6 2003/03/13 11:50:37 robbat2 Exp $ */

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
        //echo 'Running SQL:'.$query."<br />\n";
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

global $MySQL_singleton_abort;
$MySQL_singleton_abort = -1;

function MySQL_singleton($query,$abort = -1) {
    global $_MySQL, $MySQL_singleton_abort;
    $_MySQL->restart();
    $_MySQL->query($query);
    $arr = $_MySQL->getRow();
    $item = $arr[0];
    if($_MySQL->getNumRows() != 1) {
        if($abort == $MySQL_singleton_abort) {
            $item = $MySQL_singleton_abort;
        } else {
            $item = $abort;
        }
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

$username = 'rats';
$passwd = 'ratty';
$db = 'rats';
$server = 'localhost:/tmp/mysql.sock';

global $_MySQL,$_MySQL_trans;
$_MySQL = new MySQL($username,$passwd,$db,$server,false);
$_MySQL_trans = new MySQL($username,$passwd,$db,$server,true);

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
