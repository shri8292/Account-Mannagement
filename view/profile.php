<?php
include_once("../model/db_connect.php");
session_start();
$uid = $_SESSION['uid'];
if ($uid == NULL) {
    header("Location: ../index.php?msg=login_first");    
} else {
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User - Profile</title>

    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">

   <script>
   $(document).ready(function(){
      $("#upload_image").hide();

      $("#update_image").click(function(){
        $("#upload_image").show();
      });
   });
   </script>


  </head>

  <body id="page-top">

 <!-- Header -->
   <?php include 'header.php'; ?>
    <div id="wrapper">

      <!-- Sidebar -->
      <?php include 'sidebar.php'; ?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Home</a>
            </li>
            <li class="breadcrumb-item active">Profile</li>
          </ol>

          <div class="row">
                      <div class="col-lg-4">
              <div class="card mb-3">
              <form name="form2" method="post" action="../controller/usercontroller.php" enctype="multipart/form-data">
              <input type="hidden" name="update_img" value="update_img" />
                <div class="card-header">
                  User Image</div>
                <div class="card-body">
                  
                  <!--User Image-->
                  <?php
                  $sql = "select * from users where uid=$uid";
                  $res = mysqli_query($conn, $sql);
                  while ($row = mysqli_fetch_array($res)) {
                     $user_image=$row['profile_image'];
                  }
                  $img = '/AccountManagment/controller/uploads/'.$user_image;
                  ?>
                  <p align="center"><img style="width:190px; height:190px;" src="<?php echo $img?>"></p>
                  
                </div>
                
              
              <p class="text-muted text-center">
              <?php
                  if(isset($_GET['msg'])){
                     echo "<br />";
                     if($_GET['msg']==="not_an_img"){
                        echo '<p align="center" style="color:red;">File is not an image.</p>';
                     }                     
                     if($_GET['msg']==="exists"){
                        echo '<p align="center" style="color:red;">Sorry, file already exists.</p>';
                     }                     
                     if($_GET['msg']==="too_large"){
                        echo '<p align="center" style="color:red;">Sorry, your file is too large.</p>';
                     }                     
                     if($_GET['msg']==="img_format"){
                        echo '<p align="center" style="color:red;">Sorry, only JPG, JPEG, PNG & GIF files are allowed.</p>';
                     }                     
                     if($_GET['msg']==="not_upload"){
                        echo '<p align="center" style="color:red;">Sorry, your file was not uploaded.</p>';
                     }                     
                     if($_GET['msg']==="upload_error"){
                        echo '<p align="center" style="color:red;">Sorry, there was an error uploading your file.</p>';
                     }   
                     if($_GET['msg']==="update"){
                        echo '<p align="center" style="color:blue;">Profile Picture successfully updated.</p>';
                     }
                  }
                ?>                
              </p>  
            <!-- /.box-body -->
            
            <div id="upload_image">
               <input type="file" name="fileToUpload" class="btn btn-primary btn-block" required />                  
               <input type="submit" value="Update Image" class="btn btn-primary btn-block">
            </div>
                </form>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="card mb-3">
                <div class="card-header">
                  User Profile</div>
                <div class="card-body">
                <?php
                  $user_image=null;
                  $sql = "select * from users where uid=$uid";
                  $res = mysqli_query($conn, $sql);
                  while ($row = mysqli_fetch_array($res)) {
                     $user_image=$row['profile_image'];
                ?>
              
            <form name="myForm" method="post" action="../controller/usercontroller.php">
            <input type="hidden" name="opn" value="edit">   
            <input type="hidden" name="userid" value="<?php echo $uid; ?>">   
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                  <div class="form-label-group">
                    <input type="text" id="username" name="username" value="<?php echo $row['username'];?>" class="form-control" required="required" autofocus="autofocus">
                    <label for="username">User name</label>
                  </div>
                </div>
                <br /><br /><br />
                <div class="col-md-12">
                  <div class="form-label-group">
                    <input type="password" id="password" name="password" value="<?php echo $row['password'];?>" class="form-control" required="required">
                    <label for="password">Password</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                  <div class="form-label-group">
                    <input type="text" id="name" name="name" value="<?php echo $row['name'];?>" class="form-control" required="required" autofocus="autofocus">
                    <label for="name">Name</label>
                  </div>
                </div>
                <br /><br /><br />                
                <div class="col-md-12">
                  <div class="form-label-group">
                    <input type="text" id="address" name="address" value="<?php echo $row['address'];?>" class="form-control" required="required">
                    <label for="address">Address</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                  <div class="form-label-group">
                    <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" class="form-control" required="required">
                    <label for="email">Email</label>
                  </div>
                </div>
                <br /><br /><br />                
                <div class="col-md-12">
                  <div class="form-label-group">
                    <input type="number" id="mobile" name="mobile" value="<?php echo $row['mobile']; ?>"class="form-control" required="required">
                    <label for="mobile">Mobile</label>
                  </div>
                </div>
              </div>
            </div>
            <input type="submit" value="Update Profile" class="btn btn-primary btn-block">
          </form>
          <?php
          }
          ?>
                </div>
              </div>
            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <?php include 'footer.php'; ?>


      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-bar-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

  </body>

</html>
<?php
                }
?>