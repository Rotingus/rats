<?php
/* $Id: GroupActionMapping.php,v 1.3 2003/04/24 00:07:52 robbat2 Exp $ */
/**
 * \brief Group-Action Mapping
 *
 */
class GroupActionMapping {

   function getActions($GroupID) {
   }
   
   function getGroups($ActionID) {
   }
   
   function add($GroupID,$ActionID) {
   }

   function addGroups($ActionID,$GroupID_array) {
    foreach($GroupID_array as $ActionID) {
        add($GroupID,$ActionID);
    }
   }
   
   function addActions($GroupID,$ActionID_array) {
    foreach($ActionID_array as $ActionID) {
        add($GroupID,$ActionID);
    }
   }
   
}

global $_GroupActionMapping;
$_GroupActionMapping = new GroupActionMapping();

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
