<?php
/* $Id: login.inc.php,v 1.5 2003/06/12 17:43:47 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/gui/login.inc.php,v $ */
//print_r(get_defined_vars());
?>
<form action="validate.php" method="POST" class="title">
<table class="title">
<tr><td>
<label for="username">Username</label>
</td>
<td>
<?php
echo textinput('username','',32);
echo hiddeninput('loginerror','0');
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
<td>
<label for="mode">Mode</label>
</td>
<td>
<?php
echo selectinput('mode',array('normal'=>'Normal','kiosk'=>'Kiosk'),'normal');
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
