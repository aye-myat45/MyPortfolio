<!DOCTYPE html>
<html lang="en">

<?php 
  require 'head.php'
?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php require 'sidebar.php';?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php require 'nav.php';
        ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Expense Management System</h1>
          <?php 
            if (isset($_REQUEST['status'])) {
             $status=$_REQUEST['status'];
             if ($status==1) {
               echo "<div class='alert alert-success'>Adding New Expense is Successful!</div>";
             }
             else if($status==2){
              echo "<div class='alert alert-info'>Update Expense Data is Successful!</div>";
             }

            }
          ?>

    <div id="addexpense" class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
          <div class="col-lg-8">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Register an Expense!</h1>
              </div>
              <form class="user" action="addexpense.php" method="post">
                <div class="form-group">
                  <input type="date" class="form-control form-control-user" name="date" placeholder="Enter Date" required="required">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="title" placeholder="Enter Title" required="required">
                </div>
                <div class="form-group">
                  <input type="number" class="form-control" name="amount" placeholder="Enter Amount" required="required">
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-info"  value="Add Expense">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
   <!--  Edit Student Information form -->
   
    <div id="editexpense" class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
          <div class="col-lg-8">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Edit Expense!</h1>
              </div>
              <form class="user" action="editexpense.php" method="post">
                <input type="hidden" name="id" id="uid">
                <div class="form-group">
                  <input type="date" class="form-control form-control-user" id="udate" name="date" required="required"  >
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="utitle" name="title" placeholder="Enter Title" required="required">
                </div>
                <div class="form-group">
                  <input type="number" class="form-control" id="uamount" name="amount" placeholder="Enter Amount" required="required">
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-info"  value="Edit Expense">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
      
      <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Expense List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Date</th>
                      <th>Title</th>
                      <th>Amount</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Date</th>
                      <th>Title</th>
                      <th>Amount</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      $expenselist=file_get_contents('expenselist.json');
                      $expenselistarray=json_decode($expenselist);
                      $i=1;
                      foreach ($expenselistarray as $key=>$expense) {
                        $date=$expense->date;
                        $title=$expense->title;
                        $amount=$expense->amount;
                        echo "<tr>
                                <td>$i</td>
                                <td>$date</td>
                                <td>$title</td>
                                <td>$amount</td>
                                <td><a href='#' class='btnedit' data-id=$key><i class='fas fa-edit'></i></a></td>
                                <td><a href='#' class='btndelete' data-id=$key><i class='fas fa-trash-alt'></i></a></td>
                                </tr>";
                        $i++;
                      }

                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php require 'footer.php';

      ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

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
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  <script type="text/javascript">

    $(document).ready(function(){

      $('#addexpense').show();
      $('#editexpense').hide();

      $("tbody").on('click','.btnedit',function(e){
        $("#addexpense").hide();
        $("#editexpense").show();
        e.preventDefault();
        var id=$(this).data('id');
        console.log(id);
        $.post('getexpenseinfo.php',
        {id:id},
        function(data){
        console.log(data);
        var expenseobj=JSON.parse(data);
        //console.log(studentobj);
        $("#uid").val(id);
        $("#udate").val(expenseobj.date);
        $("#utitle").val(expenseobj.title);
        $("#uamount").val(expenseobj.amount);
      })
      })


      $("tbody").on('click','.btndelete',function(e){
        e.preventDefault();
        var id=$(this).data('id');
        console.log(id);
        var ans=confirm("Are you sure?");
        if (ans) {
          $.post('deleteexpense.php',
            {id:id},
            function(data){
              console.log(data);
              var expenselistarray=JSON.parse(data);
              //console.log(studentlistarray);
              var html='';
              var j=1;
              $.each(expenselistarray,function(i,v){
                if (v) {
                  var date=v.date;
                  var title=v.title;
                  var amount=v.amount;
                  html=html+`<tr>
                                <td>${j}</td>
                                <td>${date}</td>
                                <td>${title}</td>
                                <td>${amount}</td>
                                <td><a href='#' class='btnedit' data-id=${i}><i class='fas fa-edit'></i></a></td>
                                <td><a href='#' class='btndelete' data-id=${i}><i class='fas fa-trash-alt'></i></a></td>
                                </tr>`;
                  j++;
                }
                $("tbody").html(html);
              })
            })
        }
      })


    })
  </script>
</body>

</html>
