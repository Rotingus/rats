<?
/*
 * Table Definition for Users
 * $Id: Users.php,v 1.1 2002/11/14 08:45:44 robbat2 Exp $
 */



require_once('DB/DataObject.php');

class DObj_Users extends DB_DataObject {

    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    var $__table='Users';                           // table name
    var $UserID;                          // int(10)  not_null primary_key unsigned zerofill auto_increment
    var $UserBarcode;                     // int(14)  not_null unique_key
    var $UserLogin;                       // string(255)  not_null unique_key
    var $UserPassword;                    // string(255)  not_null


    /* ZE2 compatibility trick*/
    function __clone() { return $this;}



    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DObj_Users',$k,$v); }


    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
?>