<?php
/* $Id: Groups.php,v 1.3 2003/04/24 00:07:52 robbat2 Exp $ */
/**
 * \brief User Groups System
 *
 */
class Groups {
    function getName($GroupID) {
    }
    function add($GroupName) {
        $query = 'INSERT INTO Groups (GroupID,GroupName) VALUES ';
    }
    function del($GroupID) {
        $query = 'DELETE FROM Groups WHERE GroupID='.MySQL_quote($GroupID);
    }
    function update($GroupID,$GroupName) {
        $query = 'UPDATE Groups SET GroupName='.MySQL_quote($GroupName).' WHERE GroupID='.MySQL_quote($GroupID).'';
    }
}
global $_Groups;
$_Groups = new Groups();

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
