<?php
/* $Id: GroupActionMapping.php,v 1.4 2003/04/28 18:11:34 robbat2 Exp $ */
/**
 * \brief Group-Action Mapping
 *
 */
class GroupActionMapping {
    $_Mapping = new GenericMapping('GroupActionMapping','GroupID','ActionID');

   function getActions($GroupID) {
       return $_Mapping->getSecondaries($GroupID);
   }
   
   function getGroups($ActionID) {
       return $_Mapping->getPrimaries($ActionID);
   }
   
   function add($GroupID,$ActionID) {
       return $_Mapping->add($GroupID,$ActionID);
   }

   function addGroups($ActionID,$GroupID_array) {
       return $_Mapping->addPrimaries($ActionID,$GroupID_array);
   }
   
   function addActions($GroupID,$ActionID_array) {
       return $_Mapping->addSecondaries($GroupID,$ActionID_array);
   }
}

global $_GroupActionMapping;
$_GroupActionMapping = new GroupActionMapping();

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
