<?php
/* $Id: invalidlogin.inc.php,v 1.3 2003/06/12 17:43:47 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/gui/invalidlogin.inc.php,v $ */
if(isset($loginerror) && $loginerror != '0') {
    $extra = v('extra','');
    if(!empty($extra)) {
        $extra = ' ('.$extra.')';
    }
?>
<p class="title"
<?php
switch($loginerror) {
case 'baduserpass' : $msg = 'Invalid Username and Password combination.'; break;
case 'spoofip' : $msg = 'You appear to be coming from two different IP addresses'.$extra.', possible man-in-the-middle attack detected!'; break;
case 'spoofhost' : $msg = 'You appear to be accessing two different HTTP Hosts'.$extra.' for this page, possible man-in-the-middle attack detected!'; break;
case 'evilcookies': $msg = 'The site MUST be accessed via either an IP address or a hostname with at least 2 periods in it.'; break;
default: $msg = 'Unknown (insert reason here)'; break;
}
echo '<h5 class="title">'.$msg.'</h5>';
?>
</p>
<?php
}
/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
