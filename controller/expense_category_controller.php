<?php
include_once("../model/db_connect.php");
session_start();
$uid = $_SESSION['uid'];
if ($uid == NULL) {
    header("Location: ../index.php?msg=login_first");    
} else {

$opn = $_GET['opn'];
//$inccatid = $_GET['inccatid'];

if ($opn != NULL) {
    if ($opn == "add") {
         $expcatname = $_POST['expcatname'];
         $expcatdetails = $_POST['expcatdetails'];
        $sql = "INSERT INTO expenses_category (exp_catname, exp_catdetails, userid) VALUES ('$expcatname', '$expcatdetails', $uid)";
        if (mysqli_query($conn, $sql)) {
            header("Location: ../view/pages/ExpensesCategory.php?msg=success");        
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }

    } else if ($opn == "delete") {
        $exp_cat_id=$_GET['exp_cat_id'];
        $sql = "delete from expenses_category where exp_catid=$exp_cat_id";
        if (mysqli_query($conn, $sql)) {
            header("Location: ../view/pages/ExpensesCategory.php");        
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }         
    } elseif ($opn = "edit") {
        $exp_cat_id=$_POST['exp_cat_id'];
         $expcatname = $_POST['expcatname'];
         $expcatdetails = $_POST['expcatdetails'];
        $sql = "update expenses_category set exp_catname='$expcatname', exp_catdetails='$expcatdetails' where exp_catid=$exp_cat_id";
        if (mysqli_query($conn, $sql)) {
            header("Location: ../view/pages/ExpensesCategory.php");        
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }
}


}
?>