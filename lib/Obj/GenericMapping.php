<?php
/* $Id: GenericMapping.php,v 1.4 2003/05/06 20:59:29 robbat2 Exp $ */
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

    function getTable() {
        return $this->_table;
    }
    function getValid() {
        return $this->_valid;
    }
    function getPrimaryKey() {
        return $this->_primarykey;
    }
    function getSecondaryKey() {
        return $this->_secondarykey;
    }

    function getSecondaries($PrimaryID) {
        $query = 'SELECT `'.$this->_secondarykey.'` FROM `'.$this->_table.'` WHERE '.$this->primaryWhere($PrimaryID).';';
        return MySQL_singletonarray($query);
    }

    function getPrimaries($SecondaryID) {
        $query = 'SELECT `'.$this->_primarykey.'` FROM `'.$this->_table.'` WHERE '.$this->secondaryWhere($SecondaryID).';';
        return MySQL_singletonarray($query);
    }

    function primaryWhere($PrimaryID) {
        return MySQL_buildonemanykey($this->_primarykey,$PrimaryID);
    }
    function secondaryWhere($SecondaryID) {
        return MySQL_buildonemanykey($this->_secondary,$SecondaryID);
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
