<?php
include_once("../model/db_connect.php");
session_start();
$uid = $_SESSION['uid'];
if ($uid == NULL) {
    header("Location: ../index.php?msg=login_first");    
} else {

$opn = $_POST['opn'];
$inc = $_POST['inc'];
$inccat = $_POST['inccat'];
$amount = $_POST['amount'];
$receiveby = $_POST['receiveby'];
$remark = $_POST['remark'];
$date = $_POST['date'];


if ($opn != NULL) {
    if ($opn == "add") {
        $sql = "INSERT INTO income (inc_ac, inc_catid, amount, tran_date, receivby, remark, userid) VALUES ('$inc', $inccat, $amount, '$date','$receiveby', '$remark', $uid)";
        if (mysqli_query($conn, $sql)) {
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }

        if ($receiveby == "cheque") {
            $sql = "INSERT INTO bank_book (account, tran_date, amount, userid, operation) VALUES ('Bank A/c', '$date',$amount, $uid, 'receive')";
            if (mysqli_query($conn, $sql)) {
            } else {
               echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }
        } else if ($receiveby == "cash") {
            $sql = "INSERT INTO cash_book (account, tran_date, amount, userid, operation) VALUES ('Cash A/c', '$date',$amount, $uid, 'receive')";
            if (mysqli_query($conn, $sql)) {
            } else {
                  echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }      
        }
        header("Location: ../view/pages/Income.php?msg=success");        
    }
}
}