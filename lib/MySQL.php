<?php
/* $Id: MySQL.php,v 1.1 2002/12/12 11:01:24 robbat2 Exp $ */

//var $mysql_conn;

class MySQL {
    var $mysql_conn;
    var $mysql_server = 'localhost';
    var $mysql_username = 'rats';
    var $mysql_passwd = 'ratty';
    var $mysql_db = 'rats';
    var $using_transactions = true;
    var $in_transaction = false;

    var $mysql_result = false;
    var $querybuffer = array();

    function MySQL() {
    }
    
    function connect() {
        if(!$mysql_conn) {
            $mysql_conn = mysql_connect($mysql_server,$mysql_username,$mysql_passwd);
            mysql_select_db($mysql_conn,$mysql_db);
        }
    }
    
    function close() {
        if($mysql_conn) {
            mysql_close($mysql_conn);
        }
    }
    
    function start() {
        bufferReset();
        if($using_transactions) {
            bufferAdd('SET AUTOCOMMIT=0');
            bufferAdd('BEGIN');
        }
    }
    
    function commit() {
        if($using_transactions) {
            bufferAdd('COMMIT');
        }
    }

    function rollback() {
        if($using_transactions) {
            bufferAdd('ROLLBACK');
        }
    }

    function run($query) {
        bufferAdd($query);
    }

    function execute() {
        commit();
        $s = '';
        foreach($querybuffer as $line) {
            $s .= $line . ';';
        }
        start();
        query($s);
    }

    function getResult() {
        return $mysql_result;
    }

    function getConnection() {
        return $mysql_conn;
    }

    function query($query) {
        $mysql_result = mysql_query($query);
    }

    function bufferAdd($newquery) {
        $querybuffer[] = $newquery;
    }

    function bufferReset() {
        $querybuffer = array();
    }

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
            $s .= '\''.MySQL_escape($arr[$i]).'\'';
            if($i+1 < $size) {
                $s .= ',';
            }
        }
        $s .= ')';
    }
    return $s;
}



/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
