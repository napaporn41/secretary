<?php
require "service/connection.php";
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $sql = "SELECT *, s.name as seller_name, t.name as durable_material_type_name, u.name as unit_name, s.tel seller_tel, s.fax seller_fax, s.address seller_address, p.document_no document_no FROM durable_material_purchase as p 
  LEFT JOIN durable_material as a ON a.id = p.product_id 
  LEFT JOIN seller as s ON a.seller_id = s.id 
  LEFT JOIN department as d ON a.department_id = d.id 
  LEFT JOIN durable_material_type as t ON a.type = t.id
  LEFT JOIN unit as u ON a.unit = u.id 
  WHERE p.id = $id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  // echo $sql;
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

  <title>secretary</title>
  <secretary style="display: none">display_durable_material_purchase</secretary>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/secretary.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include "navigation/navbar.php"; ?>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- เริ่มเขียนโค๊ดตรงนี้ -->
      <div class="row ">
        <p class="" onclick="window.history.back()" style="cursor: pointer">
          <i class="fas fa-angle-left"></i> กลับ
        </p>
      </div>
      <div class="row">
        <div class="col-md-8 offset-2">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <nav class="navbar navbar-light bg-light">
                <h5 class="m-0 font-weight-bold text-danger">
                  <i class="fas fa-business-time"></i> ข้อมูลการจัดซื้อ(วัสดุคงทน)</h5>
                <form class="form-inline">
                  <div>
                </form>
            </div>
          </div>
          </nav>
          <form>
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="card" style="width: 200px;">
                    <img class="img-thumbnail" src="uploads/<?php echo $row["picture"]; ?>">
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark body-text" for="order_no">เลขที่ใบสั่งซื้อ : </label>
                      <?php echo ($row["order_no"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark body-text" for="purchase_date">วันที่จัดซื้อ : </label>
                      <?php echo ($row["purchase_date"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark body-text" for="document_no">เลขที่เอกสาร : </label>
                      <?php echo ($row["document_no"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark body-text" for="attribute">คุณสมบัติ/ลักษณะ : </label>
                      <?php echo ($row["attribute"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark body-text" for="name">ชื่อวัสดุคงทน : </label>
                      <?php echo ($row["name"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label class="text-dark body-text" for="order_by">ชื่อผู้จัดซื้อ : </label>
                      <?php echo ($row["order_by"]); ?>
                    </div>
                    <div class="col-md-6">
                      <label class="text-dark body-text" for="receiver">ชื่อผู้รับ : </label>
                      <?php echo ($row["receiver"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark body-text" for="receive_date">วันที่ตรวจรับ : </label>
                      <?php echo ($row["receive_date"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark body-text" for="receive_address">สถานที่จัดส่ง : </label>
                      <?php echo ($row["receive_address"]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark body-text" for="number">จำนวนปีวัสดุ : </label>
                      <?php echo ($row["number"]); ?>
                    </div>
                  </div>
                </div>
              </div>
          
        </div>
      </div>
    </div>
  </div></form>
  <!-- สิ้นสุดการเขียนตรงนี้ -->
  </div>
  <!-- /.container-fluid -->


  </div>
  <!-- End of Main Content -->

  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>By &copy; Sirirat Napaporn Bongkotchaporn</span>
      </div>
    </div>
  </footer>
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
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="js/secretary.js"></script>

</body>

</html>