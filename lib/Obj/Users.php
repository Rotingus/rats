<?php
/* $Id: Users.php,v 1.5 2003/05/07 19:57:20 robbat2 Exp $ */
/**
 * \brief User handling system
 *
 */
class Users {
    function Users() {
    }
    function getID($keyval) {
        $query = 'SELECT UserID FROM Users WHERE '.MySQL_buildonemanykey('UserLogin',$keyval).' OR '.MySQL_buildonemanykey('UserBarcode',$keyval);
        return MySQL_singleton($query);
    }
    function getID_login($login) {
        $query = 'SELECT UserID FROM Users WHERE '.MySQL_buildonemanykey('UserLogin',$login);
        return MySQL_singleton($query);
    }
    function getID_barcode($barcode) {
        $query = 'SELECT UserID FROM Users WHERE '.MySQL_buildonemanykey('UserBarcode',$barcode);
        return MySQL_singleton($query);
    }
    function exists($barcode) {
        global $MySQL_singleton_abort;
        $val = getID_barcode($barcode);
        return $val != $MySQL_singleton_abort;
    }
    function getID_login_password($login,$password) {
        $query = 'SELECT UserID FROM Users WHERE '.MySQL_buildonemanykey('UserLogin',$login).' AND '.MySQL_buildonemanykey('UserPassword',$password);
        return MySQL_singleton($query);
    }

}

global $_Users;
$_Users = new Users();

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
