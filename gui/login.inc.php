<?php
/* $Id: login.inc.php,v 1.1 2003/03/13 11:26:52 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/gui/login.inc.php,v $ */
?>
<form action="main.php" method="POST" class="title">
<table class="title">
<tr><td>
<label for="username">Username</label>
</td>
<td>
<?php
echo textinput('username','',64);
?>
</td>
</tr>
<tr>
<td>
<label for="password">Password</label>
</td>
<td>
<?php
echo passwordinput('password','',64);
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
/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
