<?php
/* $Id: Transactions.php,v 1.5 2002/12/12 22:55:31 robbat2 Exp $ */
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
        $arr = $_Actions->lookup($ActionCode);
        $ActionID = $arr[0];
        $GenericTable = $arr[1];
        $this->addcomplex($UserID,MySQL_quote($GenericTable),$GenericID,$ActionID);
    }
    function addcomplex($UserID,$GenericTable,$GenericID,$ActionID) {
        $tmp = array($UserID,$GenericTable,$GenericID,$ActionID);
        $this->actionbuffer->addLast($tmp);
    }
    function generateSQL() {
        $size = $this->actionbuffer->getSize();
        $query = '';
        if($size > 0) {
            $query = 'INSERT INTO Transactions (UserID,GenericTable,GenericID,ActionID) VALUES ';
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
