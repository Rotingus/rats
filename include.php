<?php
/* $Id: include.php,v 1.7 2003/05/01 22:20:10 robbat2 Exp $ */
/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
/* 
egrep -v '^include|^\?>' include.php > include.php.new
PRINTF="-printf \"include '%p';\n\""
COMMON='-xtype f -name "*php" ! -name "*inc*" ! -name DObj '$PRINTF
( eval find . -mindepth 2 $COMMON ) >>include.php.in
( eval find ./lib $COMMON) >>include.php.in
cat include.php.in | sort | uniq >>include.php.new
rm -rf include.php.in
echo '?>' >>include.php.new
mv include.php.new include.php
*/

include './gui/array.lib.php';
include './gui/html.lib.php';
include './gui/tablehelper.lib.php';
include './lib/Barcode.php';
include './lib/DataStructure/List.php';
include './lib/MySQL.php';
include './lib/Obj/Actions.php';
include './lib/Obj/Bookings.php';
include './lib/Obj/CheckOuts.php';
include './lib/Obj/GenericMapping.php';
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
include './lib/admin.lib.php';
include './lib/mysql.lib.php';
?>
