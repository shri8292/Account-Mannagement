<?php
include_once("../../model/db_connect.php");
session_start();
$uid = $_SESSION['uid'];
if ($uid == NULL) {
    header("Location: ../../index.php?msg=login_first");    
} else {
if (isset($_POST['sd']) && isset($_POST['ed'])) {
    $sd = $_POST['sd'];
    $ed = $_POST['ed'];
} else {
    $sd = date("Y/m/d");
    $ed = date("Y/m/d");
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Day Book</title>

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
        <div class="card-header">Day Book</div>
        <div class="card-body">
          <form name="myform" method="post" action="Day_Book.php">
            <div class="form-group">
              <div class="form-label-group">
                <input type="date" name="sd" id="sd" class="form-control" placeholder="Date From" required="required" autofocus="autofocus">
                <label for="sd">Date From</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="date" name="ed" id="ed" class="form-control" placeholder="Date To" required="required">
                <label for="ed">Date To</label>
              </div>
            </div>
            <input type="submit" value="Submit Details" class="btn btn-primary btn-block" />
          </form>
        </div>
      </div>
      <br />
      
      <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Day Book Table</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>S.no.</th>
                      <th>Account</th>
                      <th>Amount</th>
                      <th>Transaction_Date</th>
                      <th>Receive By / Pay By</th>
                      <th>Remark</th>                      
                    </tr>
                  </thead>
                  <tbody>
                  <tr>
                  <td colspan="6" align="center" style="color:blue;">Incomes </td>
                  </tr>
                  <?php
                     $sql = "select * from Income where userid=$uid and tran_date between '$sd' and '$ed'";
                     $res = mysqli_query($conn, $sql);
                     $cnt=0;
                     while ($row = mysqli_fetch_array($res)) {
                        $cnt++;
                        echo '<tr>';
                        echo '<td>'.$cnt.'</td>';                        
                        echo '<td>'.$row['inc_ac'].'</td>';
                        echo '<td>'.$row['amount'].'</td>';                        
                        echo '<td>'.$row['tran_date'].'</td>';
                        echo '<td>'.$row['receivby'].'</td>';                        
                        echo '<td>'.$row['remark'].'</td>';                                                
                        echo '</tr>';  
                     }         
                    ?>
                    <tr>
                     <td colspan="6" align="center" style="color:blue;">Expenses</td>
                  </tr>
                  <?php
                     $sql = "select * from Expenses where userid=$uid and tran_date between '$sd' and '$ed'";
                     $res = mysqli_query($conn, $sql);
                     $cnt=0;
                     while ($row = mysqli_fetch_array($res)) {
                        $cnt++;
                        echo '<tr>';
                        echo '<td>'.$cnt.'</td>';                        
                        echo '<td>'.$row['exp_ac'].'</td>';
                        echo '<td>'.$row['amount'].'</td>';                        
                        echo '<td>'.$row['tran_date'].'</td>';
                        echo '<td>'.$row['payby'].'</td>';                        
                        echo '<td>'.$row['remark'].'</td>';                                                
                        echo '</tr>';  
                     }         
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

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
              <span aria-hidden="true">�</span>
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