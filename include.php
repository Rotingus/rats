<?php
/* $Id: include.php,v 1.2 2002/12/12 13:39:42 robbat2 Exp $ */
/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
//find -xtype f -name '*php' -mindepth 2 |egrep -v DObj |xargs -l1 echo include |sort|>>include.php

include './lib/Barcode.php';
include './lib/DataStructure/List.php';
include './lib/MySQL.php';
include './lib/Obj/Actions.php';
include './lib/Obj/Bookings.php';
include './lib/Obj/CheckOuts.php';
include './lib/Obj/GroupActionMapping.php';
include './lib/Obj/Groups.php';
include './lib/Obj/Manufacters.php';
include './lib/Obj/Notes.php';
include './lib/Obj/ObjectTypes.php';
include './lib/Obj/Objects.php';
include './lib/Obj/Purchases.php';
include './lib/Obj/Transactions.php';
include './lib/Obj/UserGroupMapping.php';
include './lib/Obj/Users.php';
?>
