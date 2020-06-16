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

    <title>Expenses</title>

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
        <div class="card-header">Expense Form</div>
        <div class="card-body">
          <?php
          if(isset($_GET['msg'])){
            if($_GET['msg']='success'){
               echo '<br /><p style="font-size:15pt; color:blue; text-align:center">Data successfully Inserted.</p>';
            }
          }
          ?>

          <form name="myform" method="post" action="../../controller/expense_controller.php">
            <input type="hidden" name="opn" value="add">            
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="exp" id="exp" class="form-control" placeholder="Expense In" required autofocus="autofocus">
                <label for="exp">Expense In </label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
              <?php
               $sql = "select * from expenses_category where userid=".$uid;
               $res = mysqli_query($conn, $sql);
              ?>
              <select name="expcat" class="form-control"  required>
               <option value="-1">Select Expense Category</option>
               <?php
                  while ($row = mysqli_fetch_array($res)) 
                  {                  
                  echo'<option value="'.$row['exp_catid'].'">'.$row['exp_catname'].'</option>';
                  }    
               ?>
              </select>

              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="amount" id="amount" class="form-control" placeholder="Amount" required>
                <label for="amount">Amount</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
              <select name="payby" class="form-control"  required>
               <option value="-1">Pay By</option>              
               <option value="cash">Cash</option>
               <option value="cheque">Cheque</option>               
              </select>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="remark" id="remark" class="form-control" placeholder="Remark" required>
                <label for="remark">Remark</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="date" name="date" id="date" class="form-control" required>
                <label for="date">Date</label>
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