<?php
/* $Id: index.php,v 1.3 2002/12/12 22:55:31 robbat2 Exp $ */
/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
//find -xtype f -name '*php' |grep -v index |grep -v DObj |xargs -l1 echo include

include 'include.php';

/* $t = new Transactions();
$t->add(100,'Actions','1','1');
$t->add(101,'Users','2','2');
$s = $t->generateSQL(); 

echo $s;
*/
if(isset($_POST['text'])) {
    $m = $_POST['mode'];
    $d = $_POST['text'];
    $arr = explode("\n",$d);
    if($m == 'checkin') {
        foreach($arr as $line) {
            $line = trim($line);
            if(isObject($line)) {
                $_CheckOuts->checkin($line);
            } else {
                echo 'Invalid barcode: '.$line.'<br />';
            }
        }
    } else if($m == 'checkout') {
        $user = trim(array_shift($arr));
        if(isUser($user)) {
            foreach($arr as $line) {
                $line = trim($line);
                if(isObject($line)) {
                    $_CheckOuts->checkout($user,$line);
                } else {
                    echo 'Invalid barcode: '.$line.'<br />';
                }
            }
        } else {
            echo 'Invalid user: '.$user.'<br />';
        }
    }

}

?>
<html>
<form action="index.php" method="post">
<select name="mode">
<option value="checkout">CheckOut</option>
<option value="checkin">CheckIn</option>
</select><br />
<textarea cols="25" rows="5" name="text" >
</textarea><br />
<input type="submit" name="submit_run" value="Run!" />
</form>
</html>
