<?php
/* $Id: Actions.php,v 1.5 2003/04/28 18:52:33 robbat2 Exp $ */
/**
 * \brief Action handling system
 *
 */
class Actions {
    function Actions() {
    }
    function lookup($str) {
        global $MySQL_singleton_abort;
        $query = 'SELECT ActionID,GenericTable FROM Actions WHERE ActionCode = '.MySQL_quote($str);
        $val = MySQL_singleton($query);
        if($val == $MySQL_singleton_abort) {
            return $val;
        } else {
            die ('Unknown Action Code');
        }
    }
    function getID($table,$action) {
        $query = 'SELECT ActionID FROM Actions WHERE GenericTable='.MySQL_quote($table).' AND ActionType='.MySQL_quote($action);
        global $MySQL_singleton_abort;
        $val = MySQL_singleton($query);
        return $val;
    }
}

global $_Actions;
$_Actions = new Actions();

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
