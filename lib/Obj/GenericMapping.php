<?php
/* $Id: GenericMapping.php,v 1.3 2003/04/29 20:47:53 robbat2 Exp $ */
/**
 * \brief Group-Action Mapping
 *
 */
class GenericMapping {
    var $_table,$_primarykey,$_secondarykey,$_valid;

    function GenericMapping($table,$primary,$secondary) {
        $this->_table = $table;
        $this->_primarykey = $primary;
        $this->_secondarykey = $secondary;
        $this->_valid = (($table.$primary.$secondary) != '');
    }

    function getSecondaries($PrimaryID) {
        $query = 'SELECT `'.$this->_secondarykey.'` FROM `'.$this->_table.'` WHERE '.MySQL_buildonemanykey($this->_primarykey,$PrimaryID).';';
        return MySQL_singletonarray($query);
    }

    function getPrimaries($SecondaryID) {
        $query = 'SELECT `'.$this->_primarykey.'` FROM `'.$this->_table.'` WHERE '.MySQL_buildonemanykey($this->_secondarykey,$SecondaryID).';';
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
