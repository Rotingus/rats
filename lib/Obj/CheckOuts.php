<?php
/* $Id: CheckOuts.php,v 1.6 2003/04/24 00:07:52 robbat2 Exp $ */
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
        if($coid == -1) {
            echo('Item is not checked out');
        } else {
            $_MySQL_trans->start();
            $_MySQL_trans->run('DELETE FROM CheckOuts WHERE CheckOutID='.MySQL_quote($coid));
            $_MySQL_trans->run($_Transactions->singleton(0,'dC',$coid));
            $_MySQL_trans->execute();
            echo('Item now checked in');
        }
    }

    function checkout($usercode,$barcode) {
        global $_MySQL_trans, $_Transactions;
        $bad = false;
        $oid = MySQL_singleton( 'SELECT ObjectID FROM Objects WHERE ObjectBarcode = '.MySQL_quote($barcode));
        if($oid == -1) {
            echo('Item unknown');
            $bad = true;
        }
        $oid = MySQL_quote($oid);
        $uid = MySQL_singleton( 'SELECT UserID FROM Users WHERE UserBarcode = '.MySQL_quote($usercode));
        if($uid == -1) {
            echo('User unknown');
            $bad = true;
        }
        $coid = MySQL_singleton('SELECT CheckOutID FROM CheckOuts WHERE ObjectID='.$oid);
        if($coid != 0) {
            echo('Item is already out, checkin first');
            $bad = true;
        }
        $uid = MySQL_quote($uid);
        if(!$bad) {
            $_MySQL_trans->start();
            //$_MySQL_trans->run("SELECT @duration := ObjectTypeLoanDuration FROM Objects LEFT JOIN ObjectTypes USING (ObjectTypeID) WHERE ObjectID=".$oid);
            //$_MySQL_trans->run("SELECT @year:=EXTRACT(YEAR FROM @duration), @month:=EXTRACT(MONTH FROM @duration), @day:=EXTRACT(DAY FROM @duration), @hour:=EXTRACT(HOUR FROM @duration), @minute:=EXTRACT(MINUTE FROM @duration), @second:=EXTRACT(SECOND FROM @duration)");
            //$_MySQL_trans->run("SELECT @duration:=CONCAT(@year*365+@month*30+@day,SUBSTRING(@duration,LOCATE(' ',@duration)))");
           // $_MySQL_trans->run("SELECT @duedate:=DATE_ADD(NOW(),INTERVAL @duration DAY_SECOND);");
            
            $_MySQL_trans->run('SELECT @duedate:=(((((((NOW() + INTERVAL
                                                EXTRACT(YEAR FROM ObjectTypeLoanDuration) YEAR) + INTERVAL
                                            EXTRACT(MONTH FROM ObjectTypeLoanDuration) MONTH) + INTERVAL
                                        EXTRACT(DAY FROM ObjectTypeLoanDuration) DAY) + INTERVAL
                                    EXTRACT(HOUR FROM ObjectTypeLoanDuration) HOUR) + INTERVAL
                                EXTRACT(MINUTE FROM ObjectTypeLoanDuration) MINUTE) + INTERVAL
                            EXTRACT(SECOND FROM ObjectTypeLoanDuration) SECOND)) FROM Objects
                    LEFT JOIN ObjectTypes USING (ObjectTypeID) WHERE
                    ObjectID='.MySQL_quote($oid).';');
            
            $_MySQL_trans->run('INSERT CheckOuts (UserID,ObjectID,CheckOutDueDate) VALUES '.MySQL_arrayToSequence(array($uid,$oid,'@duedate')));
            $_MySQL_trans->run($_Transactions->singleton(0,'aC','LAST_INSERT_ID()'));
            $_MySQL_trans->execute();
            echo('Item now checked out');
        }
    }

}

global $_CheckOuts;
$_CheckOuts = new CheckOuts();

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
