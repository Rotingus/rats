<?php
/* $Id: GroupActionMapping.php,v 1.6 2003/04/29 20:47:53 robbat2 Exp $ */
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
}

global $_GroupActionMapping;
$_GroupActionMapping = new GroupActionMapping();

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
