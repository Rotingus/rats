<?php
/* $Id: Actions.php,v 1.7 2003/05/07 19:57:20 robbat2 Exp $ */
/**
 * \brief Action handling system
 *
 */
class Actions {
    function Actions() {
    }

    function getID_code($str) {
        global $MySQL_singleton_abort;
        MySQL_buildonemanykey('ActionCode',$str);
        $query = 'SELECT ActionID FROM Actions WHERE ActionCode = '.MySQL_quote($str);
        $val = MySQL_singleton($query);
        if($val != $MySQL_singleton_abort) {
            return $val;
        } else {
            die ('Unknown Action Code');
        }
    }

    function getID_table_action($table,$action) {
        $query = 'SELECT ActionID FROM Actions WHERE '.MySQL_buildonemanykey('ActionGenericTable',$table).' AND '.MySQL_buildonemanykey('ActionType',$action);
        global $MySQL_singleton_abort;
        $val = MySQL_singleton($query);
        return $val;
    }
}

global $_Actions;
$_Actions = new Actions();

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
