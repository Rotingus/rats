<?php
/* $Id: CheckOuts.php,v 1.3 2002/12/12 13:39:42 robbat2 Exp $ */
/**
 * \brief Object CheckOuts
 *
 */
class CheckOuts {

    function CheckOuts() {
    }

    function checkin($barcode) {
        $query = 'SELECT CheckOutID FROM CheckOuts LEFT JOIN Objects USING (ObjectID) WHERE ObjectBarcode = '.MySQL_quote($barcode);
        global $_MySQL_trans, $_Transactions;
        $coid = MySQL_singleton($query);
        if($coid == 0) {
            echo('Item is not checked out');
        } else {
            $_MySQL_trans->start();
            $_MySQL_trans->run("DELETE FROM CheckOuts WHERE CheckOutID=".MySQL_quote($coid));
            $_MySQL_trans->run($_Transactions->singleton(0,'dC',$coid));
            $_MySQL_trans->execute();
            echo('Item now checked in');
        }
    }

    function checkout($usercode,$barcode) {
        global $_MySQL_trans, $_Transactions;
        $bad = false;
        $oid = MySQL_singleton( 'SELECT ObjectID FROM Objects WHERE ObjectBarcode = '.MySQL_quote($barcode));
        if($oid == 0) {
            echo('Item unknown');
            $bad = true;
        }
        $oid = MySQL_quote($oid);
        $uid = MySQL_singleton( 'SELECT UserID FROM Users WHERE UserBarcode = '.MySQL_quote($usercode));
        if($uid == 0) {
            echo('User unknown');
            $bad = true;
        }
        $uid = MySQL_quote($uid);
        $retdate = MySQL_singleton('SELECT DATE_ADD(ObjectTypeLoanDuration,TODAY()) FROM Objects LEFT JOIN ObjectTypes USING (ObjectTypeID) WHERE ObjectID='.$oid);
        $retdate = MySQL_quote($retdate);
        
        if(!$bad) {
            $_MySQL_trans->start();
            $_MySQL_trans->run("INSERT CheckOuts (UserID,ObjectID,CheckOutDueDate) VALUES ".MySQL_arrayToSequence(array($uid,$oid,$retdate)));
            $_MySQL_trans->run($_Transactions->singleton(0,'aC','LAST_INSERT_ID()'));
            $_MySQL_trans->execute();
            echo('Item now checked in');
        }
    }

}

global $_CheckOuts;
$_CheckOuts = new CheckOuts();

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
