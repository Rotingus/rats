<?php
/* $Id: index.php,v 1.5 2003/01/23 21:02:55 robbat2 Exp $ */
/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */

include 'include.php';
include './gui/header.inc.php';
include './gui/title.inc.php';

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
include './gui/footer.inc.php';
?>
