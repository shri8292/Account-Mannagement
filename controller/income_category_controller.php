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
         $inccatname = $_POST['inccatname'];
         $inccatdetails = $_POST['inccatdetails'];
        $sql = "INSERT INTO income_category (inc_catname, inc_catdetails, userid) VALUES ('$inccatname', '$inccatdetails', $uid)";
        if (mysqli_query($conn, $sql)) {
            header("Location: ../view/pages/IncomeCategory.php?msg=success");        
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }

    } else if ($opn == "delete") {
        $inc_cat_id=$_GET['inc_cat_id'];
        $sql = "delete from income_category where inc_catid=$inc_cat_id";
        if (mysqli_query($conn, $sql)) {
            header("Location: ../view/pages/IncomeCategory.php");        
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }         
    } elseif ($opn = "edit") {
        $inc_cat_id=$_POST['inc_cat_id'];
         $inccatname = $_POST['inccatname'];
         $inccatdetails = $_POST['inccatdetails'];
        $sql = "update income_category set inc_catname='$inccatname', inc_catdetails='$inccatdetails' where inc_catid=$inc_cat_id";
        if (mysqli_query($conn, $sql)) {
            header("Location: ../view/pages/IncomeCategory.php");        
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }
}


}