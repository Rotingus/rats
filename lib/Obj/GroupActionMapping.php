<?php
/* $Id: GroupActionMapping.php,v 1.8 2003/05/07 11:22:55 robbat2 Exp $ */
/**
 * \brief Group-Action Mapping
 *
 */
class GroupActionMapping {
   var $_Mapping;
   function GroupActionMapping() {
    $this->_Mapping = new GenericMapping('GroupActionMapping','GroupID','ActionID');
   }
   function getActions($GroupID) {
       return $this->_Mapping->getSecondaries($GroupID);
   }
   function getGroups($ActionID) {
       return $this->_Mapping->getPrimaries($ActionID);
   }
   function add($GroupID,$ActionID) {
       return $this->_Mapping->add($GroupID,$ActionID);
   }
   function addGroups($ActionID,$GroupID_array) {
       return $this->_Mapping->addPrimaries($ActionID,$GroupID_array);
   }
   function addActions($GroupID,$ActionID_array) {
       return $this->_Mapping->addSecondaries($GroupID,$ActionID_array);
   }
   function getGroupActionTable($GroupID,$table) {
       $query = 'SELECT ActionType,TRUE FROM Actions JOIN GroupActionMapping USING (ActionID) WHERE '.$this->_Mapping->primaryWhere($GroupID).' AND '.MySQL_buildonemanykey('ActionGenericTable',$table).';';

$overridePerm = 0; // 0 for normal op - FIXME TODO
$query1 = 'SELECT DISTINCT ActionType,1 FROM Actions JOIN GroupActionMapping USING (ActionID)  WHERE '.$this->_Mapping->primaryWhere($GroupID).' AND '.MySQL_buildonemanykey('ActionGenericTable',$table).';';
$query2 = 'SELECT DISTINCT ActionType,'.$overridePerm.' FROM Actions';
$arr1 = MySQL_associativesingleton($query1);
$arr2 = MySQL_associativesingleton($query2);
$arr = array_merge($arr2,$arr1);
return $arr;
   }
}

global $_GroupActionMapping;
$_GroupActionMapping = new GroupActionMapping();

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
