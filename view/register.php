<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User - Register</title>

    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Register an Account</div>
        <div class="card-body">
          <form name="myForm" method="post" action="../controller/usercontroller.php" enctype="multipart/form-data">
            <input type="hidden" name="opn" value="add">   
            <div class="form-group">
               <div class="form-label-group">
                  <input type="text" id="username" name="username" class="form-control" placeholder="User name" required="required" autofocus="autofocus">
                  <label for="username">User name</label>
               </div>
            </div>
            
            <div class="form-group">            
               <div class="form-label-group">
                  <input type="password" id="password" name="password" class="form-control" placeholder="password" required="required">
                  <label for="password">Password</label>
               </div>
            </div>
            
            <div class="form-group">
               <div class="form-label-group">
                  <input type="text" id="name" name="name" class="form-control" placeholder="Name" required="required" autofocus="autofocus">
                  <label for="name">Name</label>
               </div>
            </div>
            
            <div class="form-group">
               <div class="form-label-group">
                  <input type="text" id="address" name="address" class="form-control" placeholder="Address" required="required">
                  <label for="address">Address</label>
               </div>
            </div>

            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="required">
                <label for="inputEmail">Email address</label>
              </div>
            </div>
            
            <div class="form-group">
               <div class="form-label-group">
                  <input type="number" id="mobile" name="mobile" class="form-control" placeholder="Mobile" required="required">
                  <label for="mobile">Mobile</label>
               </div>
            </div>
            <div class="form-group">
               <div class="form-label-group">
                  <input type="file" id="fileToUpload" name="fileToUpload" class="form-control" placeholder="Profile Image" required="required">
                  <label for="fileToUpload">Profile Image</label>
               </div>
            </div>
            
            <?php
                  if(isset($_GET['msg'])){
                     if($_GET['msg']==="not_an_img"){
                        echo '<p align="center" style="color:red;">It is not an image.</p>';
                     }                     
                     if($_GET['msg']==="exists"){
                        echo '<p align="center" style="color:red;">Sorry, Image already exists.</p>';
                     }                     
                     if($_GET['msg']==="too_large"){
                        echo '<p align="center" style="color:red;">Sorry, your image is too large.</p>';
                     }                     
                     if($_GET['msg']==="img_format"){
                        echo '<p align="center" style="color:red;">Sorry, only JPG, JPEG, PNG & GIF image are allowed.</p>';
                     }                     
                     if($_GET['msg']==="not_upload"){
                        echo '<p align="center" style="color:red;">Sorry, your image was not uploaded.</p>';
                     }                     
                     if($_GET['msg']==="upload_error"){
                        echo '<p align="center" style="color:red;">Sorry, there was an error uploading your image.</p>';
                     }                     
                  }
                ?>          
            <input type="submit" value="Register" class="btn btn-primary btn-block">
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="../index.php">Back to Login Page</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
