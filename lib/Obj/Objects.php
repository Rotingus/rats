<?php
/* $Id: Objects.php,v 1.3 2002/12/12 13:39:42 robbat2 Exp $ */
/**
 * \brief Object handling system
 *
 */
class Objects {
    var $barcode;
    function Objects($newbarcode = -1) {
        $this->barcode = $newbarcode;
    }
}

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
