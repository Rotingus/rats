<?
/*
 * Table Definition for ObjectTypes
 * $Id: ObjectTypes.php,v 1.1 2002/11/14 08:45:44 robbat2 Exp $
 */



require_once('DB/DataObject.php');

class DObj_ObjectTypes extends DB_DataObject {

    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    var $__table='ObjectTypes';                     // table name
    var $ObjectTypeID;                    // int(10)  not_null primary_key unsigned zerofill auto_increment
    var $ManufacterID;                    // int(10)  not_null multiple_key
    var $ObjectTypeDescription;           // blob(65535)  not_null blob
    var $ObjectTypeModel;                 // string(255)  not_null multiple_key
    var $ObjectTypeGenericName;           // string(255)  not_null multiple_key
    var $ObjectTypeClass;                 // string(9)  not_null multiple_key enum
    var $ObjectTypePriority;              // string(7)  not_null multiple_key enum
    var $ObjectTypeLoanDuration;          // datetime(19)  not_null


    /* ZE2 compatibility trick*/
    function __clone() { return $this;}



    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DObj_ObjectTypes',$k,$v); }


    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
?>