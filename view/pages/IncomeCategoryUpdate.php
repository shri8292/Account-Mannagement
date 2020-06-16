<?php
include_once("../../model/db_connect.php");
session_start();
$uid = $_SESSION['uid'];
if ($uid == NULL) {
    header("Location: ../../index.php?msg=login_first");    
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

    <title>Income Category </title>

    <!-- Bootstrap core CSS-->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

   <!-- Header -->
   <?php include '../header.php'; ?>
    <div id="wrapper">

      <!-- Sidebar -->
      <?php include '../sidebar.php'; ?>


      <div id="content-wrapper">

      <div class="container-fluid">
        
      <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Edit Income Category Form</div>
        <div class="card-body">
          <?php
          if(isset($_GET['msg'])){
            if($_GET['msg']='success'){
               echo '<br /><p style="font-size:15pt; color:blue; text-align:center">Data successfully Inserted.</p>';
            }
          }
          ?>

          <form name="myform" method="post" action="../../controller/income_category_controller.php?opn=edit">
            <?php
               $sql = "select * from income_category where inc_catid=".$_GET['inc_cat_id'];
               $res = mysqli_query($conn, $sql);
               $inc_cat_name;
               $inc_cat_details;
               while ($row = mysqli_fetch_array($res)) {
                  $inc_cat_id=$row['inc_catid'];
                  $inc_cat_name=$row['inc_catname'];                  
                  $inc_cat_details=$row['inc_catdetails'];                  
               }               
            ?>
            <input type="hidden" name="inc_cat_id" value="<?php echo $inc_cat_id; ?>">            
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="inccatname" id="inccatname" class="form-control" placeholder="Income Category" value="<?php echo $inc_cat_name; ?>" required="required" autofocus="autofocus">
                <label for="inccatname">Income Category</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="inccatdetails" id="inccatdetails" class="form-control" placeholder="Income Category Details"  value="<?php echo $inc_cat_details; ?>" required="required">
                <label for="inccatdetails">Income Category Details</label>
              </div>
            </div>
            <input type="submit" value="Submit Details" class="btn btn-primary btn-block" />
          </form>
        </div>
      </div>
      <br />
      

    </div>
    </div>
    <!-- /.container-fluid -->

    <!-- Sticky Footer -->
    <?php include '../footer.php'; ?>

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
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="../../vendor/chart.js/Chart.min.js"></script>
    <script src="../../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="../../js/demo/datatables-demo.js"></script>
    <script src="../../js/demo/chart-area-demo.js"></script>

  </body>

</html>
<?php
                }
?>