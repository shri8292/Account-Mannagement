<?php
include_once("../model/db_connect.php");
session_start();
$userid = $_SESSION['uid'];


if(isset($_POST['update_img'])){
   $update_img = $_POST['update_img'];
}

if(isset($_POST['opn'])){
$opn = $_POST['opn'];
$uname = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$address = $_POST['address'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];

   if ($opn == "add" && $address != NULL && $email != NULL && $mobile != NULL && $name != NULL && $password != NULL && $uname != NULL) {
      $date=date("D_Y_m_d_H_i_s");
      $user_img= $date.'_'.basename($_FILES["fileToUpload"]["name"]);    
      $target_dir = "uploads/";
      $target_file = $target_dir . $date.'_'.basename($_FILES["fileToUpload"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   
      // Check if image file is a actual image or fake image
      if(isset($_POST["submit"])) {
         $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
         if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
         } else {
            //echo "File is not an image.";
            $uploadOk = 0;
            header("Location: ../view/register.php?msg=not_an_img");
         }
      }  

      // Check if file already exists
      if (file_exists($target_file)) {
         //echo "Sorry, file already exists.";
         $uploadOk = 0;
         header("Location: ../view/register.php?msg=exists");
      }

      // Check file size
      if ($_FILES["fileToUpload"]["size"] > 500000) {
         //echo "Sorry, your file is too large.";
         $uploadOk = 0;
         header("Location: ../view/register.php?msg=too_large");
      }  

      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
         //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
         $uploadOk = 0;
         header("Location: ../view/register.php?msg=img_format");
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
         //echo "Sorry, your file was not uploaded.";
         // if everything is ok, try to upload file
         header("Location: ../view/register.php?msg=not_upload");
      } else {
         if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            $sql = "insert into users (username, password, name, address, mobile, email, profile_image) values('$uname', '$password', '$name', '$address', '$mobile', '$email', '$user_img')";
            $res = mysqli_query($conn, $sql);
            header("Location: ../index.php?msg=register");
         } else {
            //echo "Sorry, there was an error uploading your file.";
            $uploadOk = 0;            
            header("Location: ../view/register.php?msg=upload_error");
         }
      }
      //echo '----------'.$user_img;      
   }else if ($opn == "edit" && $address != NULL && $email != NULL && $mobile != NULL && $name != NULL && $password != NULL && $uname != NULL) {
      $sql = "update users set username='$uname', password='$password', name='$name', address='$address', mobile='$mobile', email='$email' where uid=$userid";
      $res = mysqli_query($conn, $sql);
      session_destroy();
      header("Location: ../index.php?msg=profile_update");
   }
}else if ($update_img == "update_img") {      
      $date=date("D_Y_m_d_H_i_s");
      $user_img= $date.'_'.basename($_FILES["fileToUpload"]["name"]);    
      $target_dir = "uploads/";
      $target_file = $target_dir . $date.'_'.basename($_FILES["fileToUpload"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   
      //echo '--------'.$user_img;
      
      // Check if image file is a actual image or fake image
      if(isset($_POST["submit"])) {
         $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
         if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
         } else {
            //echo "File is not an image.";
            $uploadOk = 0;
            echo '<script type="text/javascript">';
            echo 'window.location="../view/profile.php?msg=not_an_img"';
            echo '</script>';
         }
      }  

      // Check if file already exists
      if (file_exists($target_file)) {
         //echo "Sorry, file already exists.";
         $uploadOk = 0;
         echo '<script type="text/javascript">';
         echo 'window.location="../view/profile.php?msg=exists"';
         echo '</script>';
      }

      // Check file size
      if ($_FILES["fileToUpload"]["size"] > 500000) {
         //echo "Sorry, your file is too large.";
         $uploadOk = 0;
         echo '<script type="text/javascript">';
         echo 'window.location="../view/profile.php?msg=too_large"';
         echo '</script>';
      }  

      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
         //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
         $uploadOk = 0;
         echo '<script type="text/javascript">';
         echo 'window.location="../view/profile.php?msg=img_format"';
         echo '</script>';
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
         //echo "Sorry, your file was not uploaded.";
         // if everything is ok, try to upload file
         echo '<script type="text/javascript">';
         echo 'window.location="../view/profile.php?msg=not_upload"';
         echo '</script>';
      } else {
         if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $sql="SELECT profile_image FROM users WHERE uid=$userid";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
               $oldimage=$row['profile_image'];
            }
            unlink('uploads/'.$oldimage);
            
            //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            
            $sql1 = "update users set profile_image='$user_img' where uid=$userid";
            $res = mysqli_query($conn, $sql1);
            echo '<script type="text/javascript">';
            echo 'window.location="../view/profile.php?msg=update"';
            echo '</script>';
         } else {
            //echo "Sorry, there was an error uploading your file.";
            $uploadOk = 0;            
            echo '<script type="text/javascript">';
            echo 'window.location="../view/profile.php?msg=upload_error"';
            echo '</script>';
         }
      }
   }
mysqli_close($conn);

