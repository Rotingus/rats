<?
/*
 * Table Definition for Notes
 * $Id: Notes.php,v 1.1 2002/11/14 08:45:44 robbat2 Exp $
 */



require_once('DB/DataObject.php');

class DObj_Notes extends DB_DataObject {

    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    var $__table='Notes';                           // table name
    var $NoteID;                          // int(10)  not_null primary_key unsigned zerofill auto_increment
    var $NoteMimeType;                    // string(255)  not_null multiple_key
    var $NoteData;                        // blob(16777215)  not_null multiple_key blob
    var $GenericTable;                    // string(12)  not_null multiple_key enum
    var $GenericID;                       // int(10)  not_null unsigned zerofill


    /* ZE2 compatibility trick*/
    function __clone() { return $this;}



    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DObj_Notes',$k,$v); }


    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
?>