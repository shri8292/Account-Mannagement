<?php
include_once("../model/db_connect.php");
session_start();
$uid = null;
$un = null;
$pw = null;

if(isset($_GET['opn'])){
   if($_GET['opn']=="login"){
      $uname = $_POST['username'];
      $password = $_POST['password'];
      //echo "user name : $uname";
      //echo "password : $password";

      if (($uname != NULL) && ($password != NULL)) {
            
         $sql = "select * from users where username='$uname' and password='$password'";
         $res = mysqli_query($conn, $sql);
         while ($row = mysqli_fetch_array($res)) {
            $uid = $row['uid'];
            $un = $row['username'];
            $pw = $row['password'];
         }         

         //echo '<br />'.$uid.' '.$un.' '.$pw;
         //echo '<br />'.$uname.' '.$password;         
         if (($uname == $un) && ($password == $pw)) {
         //echo '========';
            $_SESSION['uid'] = $uid;
            $_SESSION['username'] = $un;
            $_SESSION['password'] = $pw;            
            header("Location: ../view/home.php");
         }else{
            header("Location: ../index.php?msg=login_error");
         }      
      }
   }
   if($_GET['opn']=="logout"){
      session_destroy();
      header("Location: ../index.php?msg=logout");
   }
}
mysqli_close($conn);

?>


