<?php
/* $Id: index.php,v 1.1 2002/12/12 11:01:24 robbat2 Exp $ */
/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
//find -xtype f -name '*php' |grep -v index |grep -v DObj |xargs -l1 echo include

include 'include.php';

/* $t = new Transactions();
$t->add(100,'Actions','1','1');
$t->add(101,'Users','2','2');
$s = $t->generateSQL(); 

echo $s;
*/

?>
<html>
<form action="index.php" method="post">
<textarea cols="25" rows="5" name="text" >
</textarea><br />
<input type="submit" name="submit_run" value="Run!" />
</form>
</html>
