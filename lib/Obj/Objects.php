<?php
/* $Id: Objects.php,v 1.4 2003/05/07 19:57:20 robbat2 Exp $ */
/**
 * \brief Object handling system
 *
 */
class Objects {
    var $barcode;
    function Objects($newbarcode = -1) {
        $this->barcode = $newbarcode;
    }
    function exists($barcode) {
        global $MySQL_singleton_abort;
        $query = 'SELECT ObjectID FROM Objects WHERE ObjectBarcode='.MySQL_quote($barcode);
        $val = MySQL_singleton($query);
        return $val != $MySQL_singleton_abort;
    }
}

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
