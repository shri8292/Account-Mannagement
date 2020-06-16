<?php
include_once("../model/db_connect.php");
session_start();
$uid = $_SESSION['uid'];
if ($uid == NULL) {
    header("Location: ../index.php?msg=login_first");    
} else {

$opn = $_POST['opn'];
$exp = $_POST['exp'];
$expcat = $_POST['expcat'];
$amount = $_POST['amount'];
$payby = $_POST['payby'];
$remark = $_POST['remark'];
$date = $_POST['date'];


if ($opn != NULL) {
    if ($opn == "add") {
        $sql = "INSERT INTO expenses (exp_ac, exp_catid, amount, tran_date, payby, remark, userid) VALUES ('$exp', $expcat, $amount, '$date','$payby', '$remark', $uid)";
        if (mysqli_query($conn, $sql)) {
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }

        if ($payby == "cheque") {
            $sql = "INSERT INTO bank_book (account, tran_date, amount, userid, operation) VALUES ('Bank A/c', '$date',$amount, $uid, 'pay')";
            if (mysqli_query($conn, $sql)) {
            } else {
               echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }
        } else if ($payby == "cash") {
            $sql = "INSERT INTO cash_book (account, tran_date, amount, userid, operation) VALUES ('Cash A/c', '$date',$amount, $uid, 'pay')";
            if (mysqli_query($conn, $sql)) {
            } else {
                  echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }      
        }
        header("Location: ../view/pages/Expenses.php?msg=success");        
    }
}
}