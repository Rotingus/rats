<?php
if (!isset($frames)) {
 $frames = FALSE;
}
if ($frames != TRUE) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "xhtml11.dtd">
<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> -->
<?php 
 } else {
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<?php 
 } // frames
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>RATS</title>
<?php
//<style type="text/css">
//include './gui/style.inc.php';
//</style>
?>
<link rel="stylesheet" type="text/css" href="css.php" />
</head>
<?php
if ($frames != TRUE) {
?>
<body>
<?php
}
?>
