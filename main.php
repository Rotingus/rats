<?php
// validate login
// either display error
// or good results
$frames = TRUE;
include 'header.inc.php';
?>

<frameset cols="96px,*" rows="*">
    <frame src="leftframe.php" name="nav" frameborder="0" />
    <frame src="rightframe.php" name="main" />
</frameset>

<?php
include 'footer.inc.php';
?>
