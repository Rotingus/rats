<?
/*
 * Table Definition for Objects
 * $Id: Objects.php,v 1.1 2002/11/14 08:45:44 robbat2 Exp $
 */



require_once('DB/DataObject.php');

class DObj_Objects extends DB_DataObject {

    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    var $__table='Objects';                         // table name
    var $ObjectID;                        // int(10)  not_null primary_key unsigned zerofill auto_increment
    var $ObjectBarcode;                   // int(14)  not_null unique_key
    var $ObjectName;                      // string(255)  not_null multiple_key
    var $ObjectSerialNumber;              // string(255)  
    var $ObjectTypeID;                    // int(10)  not_null multiple_key
    var $PurchaseID;                      // int(10)  not_null multiple_key unsigned zerofill
    var $ObjectGroupID;                   // int(10)  unsigned zerofill
    var $ObjectInGroup;                   // string(3)  not_null enum


    /* ZE2 compatibility trick*/
    function __clone() { return $this;}



    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DObj_Objects',$k,$v); }


    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
?>