<?php
/* $Id: UserGroupMapping.php,v 1.5 2003/04/29 20:47:53 robbat2 Exp $ */
/**
 * \brief User-Group Mapping
 *
 */
class UserGroupMapping {
    var $_Mapping;

   function UserGroupMapping() {
    $this->_Mapping = new GenericMapping('UserGroupMapping','UserID','GroupID');
   }

   function getGroups($UserID) {
       return $this->_Mapping->getSecondaries($UserID);
   }
   
   function getUsers($GroupID) {
       return $this->_Mapping->getPrimaries($GroupID);
   }
   
   function add($UserID,$GroupID) {
       return $this->_Mapping->add($UserID,$GroupID);
   }

   function addUsers($GroupID,$UserID_array) {
       return $this->_Mapping->addPrimaries($GroupID,$UserID_array);
   }
   
   function addGroups($UserID,$GroupID_array) {
       return $this->_Mapping->addSecondaries($UserID,$GroupID_array);
   }
}

global $_UserGroupMapping;
$_UserGroupMapping = new UserGroupMapping();

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
