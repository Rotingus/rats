<?php
/* $Id: CheckOuts.php,v 1.7 2003/05/07 19:57:20 robbat2 Exp $ */
/**
 * \brief Object CheckOuts
 *
 */
class CheckOuts {

    function CheckOuts() {
    }

    function checkin($barcode) {
        global $MySQL_singleton_abort;
        $query = 'SELECT CheckOutID FROM CheckOuts LEFT JOIN Objects USING (ObjectID) WHERE ObjectBarcode = '.MySQL_quote($barcode);
        global $_MySQL_trans, $_Transactions;
        $coid = MySQL_singleton($query);
        if($coid == $MySQL_singleton_abort) {
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
        global $MySQL_singleton_abort;
        global $_MySQL_trans, $_Transactions;
        $bad = false;
        $oid = MySQL_singleton( 'SELECT ObjectID FROM Objects WHERE ObjectBarcode = '.MySQL_quote($barcode));
        if($oid == $MySQL_singleton_abort) {
            echo('Item unknown');
            $bad = true;
        }
        $uid = MySQL_singleton( 'SELECT UserID FROM Users WHERE UserBarcode = '.MySQL_quote($usercode));
        if($uid == $MySQL_singleton_abort) {
            echo('User unknown');
            $bad = true;
        }
        $coid = MySQL_singleton('SELECT CheckOutID FROM CheckOuts WHERE ObjectID='.MySQL_quote($oid));
        if($coid != $MySQL_singleton_abort) {
            echo('Item is already out, checkin first ('.$coid.')');
            $bad = true;
        }
        if(!$bad) {
            $_MySQL_trans->start();
            //$_MySQL_trans->run("SELECT @duration := ObjectTypeLoanDuration FROM Objects LEFT JOIN ObjectTypes USING (ObjectTypeID) WHERE ObjectID=".$oid);
            //$_MySQL_trans->run("SELECT @year:=EXTRACT(YEAR FROM @duration), @month:=EXTRACT(MONTH FROM @duration), @day:=EXTRACT(DAY FROM @duration), @hour:=EXTRACT(HOUR FROM @duration), @minute:=EXTRACT(MINUTE FROM @duration), @second:=EXTRACT(SECOND FROM @duration)");
            //$_MySQL_trans->run("SELECT @duration:=CONCAT(@year*365+@month*30+@day,SUBSTRING(@duration,LOCATE(' ',@duration)))");
           // $_MySQL_trans->run("SELECT @duedate:=DATE_ADD(NOW(),INTERVAL @duration DAY_SECOND);");

           $query1 = 'SELECT @duedate:=(((((((NOW() + INTERVAL EXTRACT(YEAR FROM
           ObjectTypeLoanDuration) YEAR) + INTERVAL EXTRACT(MONTH FROM
           ObjectTypeLoanDuration) MONTH) + INTERVAL EXTRACT(DAY FROM
           ObjectTypeLoanDuration) DAY) + INTERVAL EXTRACT(HOUR FROM
           ObjectTypeLoanDuration) HOUR) + INTERVAL EXTRACT(MINUTE FROM
           ObjectTypeLoanDuration) MINUTE) + INTERVAL EXTRACT(SECOND FROM
           ObjectTypeLoanDuration) SECOND)) FROM Objects LEFT JOIN ObjectTypes
           USING (ObjectTypeID) WHERE ObjectID='.MySQL_quote($oid).';';
           $query2 = 'INSERT CheckOuts (UserID,ObjectID,CheckOutDueDate) VALUES '.MySQL_arrayToSequence(array(MySQL_quote($uid),MySQL_quote($oid),'@duedate'),TRUE,FALSE);
            $_MySQL_trans->run($query1);
            $_MySQL_trans->run($query2);
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
