<?php
/* $Id: Actions.php,v 1.4 2002/12/12 13:39:42 robbat2 Exp $ */
/**
 * \brief Action handling system
 *
 */
class Actions {
    function Actions() {
    }
    function lookup($str) {
        static $bq = 'SELECT ActionID,GenericTable FROM Actions WHERE ActionCode = ';
        $query = $bq . MySQL_quote($str);
        global $_MySQL;
        $_MySQL->restart();
        $_MySQL->query($query);
        $arr = $_MySQL->getRow();
        if($_MySQL->getNumRows() == 1) {
            return $arr;
        } else {
            die ('Unknown Action Code');
        }
    }
}

global $_Actions;
$_Actions = new Actions();

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
