<?php
/* $Id: Transactions.php,v 1.3 2002/12/12 11:01:24 robbat2 Exp $ */
/**
 * \brief Transactions logging system
 *
 */
class Transactions {
    var $actionbuffer;
    var $tablename;
    function Transactions() {
        $this->actionbuffer =& new DataStructure_List;
        $this->tablename = 'Transactions';
    }
    function add($UserID,$GenericTable,$GenericID,$ActionID) {
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
        $this->actionbuffer->emptyList();
        return $query;
    }
}


/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
