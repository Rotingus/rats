<?php
/* $Id: index.php,v 1.6 2003/03/13 09:43:26 robbat2 Exp $ */
/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */

$skipvalidate = TRUE;

include 'header.inc.php';
include 'gui/title.inc.php';

?>
<form action="main.php" method="POST" class="title">
<table class="title">
<tr><td>
<label for="username">Username</label>
</td>
<td>
<?php
echo textinput('username','',32);
?>
</td>
</tr>
<tr>
<td>
<label for="password">Password</label>
</td>
<td>
<?php
echo passwordinput('password','',32);
?>
</td>
</tr>
<tr>
<td colspan="2">
<?php
echo submitinput('login','Login');
?>
</td>
</tr>
</table>
</form>

<?php
include 'footer.inc.php';
?>
