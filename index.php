<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Login</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
        <?php
         if(isset($_GET['msg'])){
            if($_GET['msg']=='logout'){
               echo '<p align="center" style="color:blue;">Logout successfully.</p>';   
            }else if($_GET['msg']=='login_error'){
               echo '<p align="center" style="color:red;">Wrong Username or Password...</p>';   
            }else if($_GET['msg']=='login_first'){
               echo '<p align="center" style="color:red;">You have to login first...</p>';   
            }else if($_GET['msg']==="register"){
               echo '<p align="center" style="color:blue;">Successfully Registered<br />Now you can login here...</p>';
            }else if($_GET['msg']==="profile_update"){
               echo '<p align="center" style="color:blue;">Profile Successfully Updated<br />Now you can login again...</p>';
            }  
         }
        ?>
          <form name="myform" method="post" action="controller/authentication.php?opn=login">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="username" id="username" class="form-control" placeholder="User name" required="required" autofocus="autofocus">
                <label for="username">User Name</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
                <label for="inputPassword">Password</label>
              </div>
            </div>
            <!--
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me">
                  Remember Password
                </label>
              </div>
            </div>
            -->
            <input type="submit" value="Login" class="btn btn-primary btn-block" />
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="view/register.php">Register an Account</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
