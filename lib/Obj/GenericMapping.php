<?php
/* $Id: GenericMapping.php,v 1.2 2003/04/28 18:52:33 robbat2 Exp $ */
/**
 * \brief Group-Action Mapping
 *
 */
class GenericMapping {
    $_table = '';
    $_primary = '';
    $_secondary = '';
    $_valid = false;

    function GenericMapping($table,$primary,$secondary) {
        setup($table,$primary,$secondary);
    }

   function setup($table,$primary,$secondary) {
       $this->_table = $table;
       $this->_primary = $primary;
       $this->_secondary = $secondary;
       $this->_valid = TRUE;
   }

   function getSecondaries($PrimaryID) {
       $query = 'SELECT `'.$secondary.'` FROM `'.$table.'` WHERE '.MySQL_buildonemanykey($primary,$PrimaryID).';';
       return MySQL_singletonarray($query);
   }
   
   function getPrimaries($SecondaryID) {
       $query = 'SELECT `'.$primary.'` FROM `'.$table.'` WHERE '.MySQL_buildonemanykey($secondary,$SecondaryID).';';
       return MySQL_singletonarray($query);
   }
   
   function add($PrimaryID,$SecondaryID) {
   }

   function addPrimaries($SecondaryID,$PrimaryID_array) {
    foreach($PrimaryID_array as $PrimaryID) {
        add($PrimaryID,$SecondaryID);
    }
   }
   
   function addSecondaries($PrimaryID,$SecondaryID_array) {
    foreach($SecondaryID_array as $SecondaryID) {
        add($PrimaryID,$SecondaryID);
    }
   }
}


/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
