<?php
/* $Id: rightframe.php,v 1.3 2003/06/20 18:19:31 robbat2 Exp $ */
/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
include 'header.inc.php';

?>
<br />
<br />
<br />
<h2 class="title">Include some running statisitcs here for the admin to see.</h2>
<h3>Adding new items quickstart:</h3>
<ol>
<li>Add the product manufacter (and vendor if different) via the <a href'addedit.php?table=Vendors'>Vendor Add</a> page.</li>
<li>Add the purchase order via the <a href'addedit.php?table=Purchases'>Purchase Add</a> page. On this page, 'Vendor' represents the company that sold it to you.</li>
<li>Add the object type via the <a href'addedit.php?table=ObjectTypes'>Object Types_Add</a> page. On this page, 'Vendor' represents the company that manufacteres the product.</li>
<li>Add the object via the <a href'addedit.php?table=Objects'>Object_Add</a> page.</li>
<li>(Repeat the above steps as needed)</li>
</ol>
<?php
include 'footer.inc.php';
?>
