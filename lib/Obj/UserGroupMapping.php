<?php
/* $Id: UserGroupMapping.php,v 1.4 2003/04/28 18:11:34 robbat2 Exp $ */
/**
 * \brief User-Group Mapping
 *
 */
class UserGroupMapping {
    $_Mapping = new GenericMapping('UserGroupMapping','UserID','GroupID');

   function getGroups($UserID) {
       return $_Mapping->getSecondaries($UserID);
   }
   
   function getUsers($GroupID) {
       return $_Mapping->getPrimaries($GroupID);
   }
   
   function add($UserID,$GroupID) {
       return $_Mapping->add($UserID,$GroupID);
   }

   function addUsers($GroupID,$UserID_array) {
       return $_Mapping->addPrimaries($GroupID,$UserID_array);
   }
   
   function addGroups($UserID,$GroupID_array) {
       return $_Mapping->addSecondaries($UserID,$GroupID_array);
   }
}

global $_UserGroupMapping;
$_UserGroupMapping = new UserGroupMapping();

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
