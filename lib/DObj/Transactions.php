<?
/*
 * Table Definition for Transactions
 * $Id: Transactions.php,v 1.1 2002/11/14 08:45:44 robbat2 Exp $
 */



require_once('DB/DataObject.php');

class DObj_Transactions extends DB_DataObject {

    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    var $__table='Transactions';                    // table name
    var $TransactionID;                   // int(10)  not_null primary_key unsigned zerofill auto_increment
    var $UserID;                          // int(10)  not_null multiple_key unsigned zerofill
    var $GenericTable;                    // string(18)  not_null enum
    var $GenericID;                       // int(10)  not_null unsigned zerofill
    var $TransactionDate;                 // timestamp(14)  not_null unsigned zerofill timestamp
    var $ActionID;                        // int(10)  not_null multiple_key unsigned zerofill


    /* ZE2 compatibility trick*/
    function __clone() { return $this;}



    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DObj_Transactions',$k,$v); }


    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
?>