<?
/*
 * Table Definition for Purchases
 * $Id: Purchases.php,v 1.1 2002/11/14 08:45:44 robbat2 Exp $
 */



require_once('DB/DataObject.php');

class DObj_Purchases extends DB_DataObject {

    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    var $__table='Purchases';                       // table name
    var $PurchaseID;                      // int(10)  not_null primary_key unsigned zerofill auto_increment
    var $PurchaseInfo;                    // blob(65535)  not_null blob


    /* ZE2 compatibility trick*/
    function __clone() { return $this;}



    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DObj_Purchases',$k,$v); }


    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
?>