<?php
/* $Id: Barcode.php,v 1.1 2002/12/12 13:39:42 robbat2 Exp $ */
/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */

function getCodabarType($str) {
    return substr($str,0,1);
}
function getCodabarInstitution($str) {
    return substr($str,1,4);
}

function isValidCodabar($str) {
    return true;
    $sum = 0;
    if(strlen($str) == 14) {
        for($i = 0; $i < 14; $i++) {
            $digit =  $str[$i];
            if($i % 2 == 0) {
                $digit *= 2;
                if($digit >= 10) {
                    $digit -= 9;
                }
            }
            $sum += $digit;

        }
        $rem = $sum % 10;
        echo "$sum $rem";
        if($rem != 0) {
            $rem = 10 - $rem;
        }
        return $rem == substr($str,13,1);
    } else {
        return false;
    }
}

global $ThisInstitution;
$ThisInstitution = '9345';

function isUser($str) {
    global $ThisInstitution;
    return isValidCodabar($str) && getCodabarType($str) == '2';
}

function isObject($str) {
    global $ThisInstitution;
    $barvalid = isValidCodabar($str);
    $typevalid = getCodabarType($str) == '3';
    $InstitutionValid = getCodabarInstitution($str) == $ThisInstitution;
    return $barvalid && $typevalid && $InstitutionValid;
}

?>
