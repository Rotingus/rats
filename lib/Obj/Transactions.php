<?php
/* $Id: Transactions.php,v 1.6 2003/05/07 19:57:20 robbat2 Exp $ */
/**
 * \brief Transactions logging system
 *
 */
class Transactions {
    var $actionbuffer;
    function Transactions() {
        $this->actionbuffer =& new DataStructure_List;
    }

    function singleton($UserID,$ActionCode,$GenericID) {
        $old = $this->actionbuffer;
        $this->actionbuffer =& new DataStructure_List;
        $this->add($UserID,$ActionCode,$GenericID);
        $str = $this->generateSQL();
        $this->actionbuffer = $old;
        return $str;
    }
    function restart() {
        $this->actionbuffer->emptyList();
    }

    function add($UserID,$ActionCode,$GenericID) {
        global $_Actions;
        $arr = $_Actions->getID_code($ActionCode);
        $ActionID = $arr[0];
        $GenericTable = $arr[1];
        $this->addcomplex($UserID,$GenericID,$ActionID);
    }
    function addcomplex($UserID,$GenericID,$ActionID) {
        $tmp = array($UserID,$GenericID,$ActionID);
        $this->actionbuffer->addLast($tmp);
    }
    function generateSQL() {
        $size = $this->actionbuffer->getSize();
        $query = '';
        if($size > 0) {
            $query = 'INSERT INTO Transactions (UserID,GenericID,ActionID) VALUES ';
            for($i = 0; $i < $size; $i++) {
                $data = $this->actionbuffer->removeFirst();
                $query .= MySQL_arrayToSequence($data);
                if($i+1 < $size) {
                    $query .= ',';
                }
            }
        }
        return $query;
    }
}

global $_Transactions;
$_Transactions = new Transactions();

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
