<?php
/* $Id: Users.php,v 1.4 2003/04/29 20:47:53 robbat2 Exp $ */
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
    function getID_login_password($login,$password) {
        $query = 'SELECT UserID FROM Users WHERE '.MySQL_buildonemanykey('UserLogin',$login).' AND '.MySQL_buildonemanykey('UserPassword',$password);
        return MySQL_singleton($query);
    }

}

global $_Users;
$_Users = new Users();

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
