<?php
require "service/connection.php";
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
  <secretary style="display: none">display_department</secretary>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/secretary.css" rel="stylesheet">
  <style type="text/css" media="print">
    @page {
      size: landscape;
    }
   
  </style>
 
</head>


<body onLoad="window.print()">

  <!-- Page Wrapper -->
  <div id="wrapper">



    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->

    <div class="container-fluid">
      <!-- เริ่มเขียนโค๊ดตรงนี้ -->
      <div class="row">
        <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                <table width="100%" border="1" class="landscape">
                <h6 class="m-3 font-weight-bold " align="center"> การเก็บข้อมูลหน่วยงานของสำนักงานเลขานุการตำรวจแห่งชาติ</h6>
                     <form>
                        <thead>
                      <tr class="text-center">
                        <th><font size="2">ลำดับ</font></th>
                        <th><font size="2">หน่วยงาน</font></th>
                        <th><font size="2">ตำแหน่ง</font></th>
                        <th><font size="2">เบอร์โทรศัพท์</font></th>
                        <th><font size="2">โทรสาร</font></th>
                        <th><font size="2">อาคาร</font></th>
                        <th><font size="2">ชั้น</font></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $sqlSelect = "SELECT * FROM department";
                      $sqlSelect .= " WHERE status = 1";
                      if (isset($_GET["keyword"])) {
                        $keyword = arabicnumDigit($_GET["keyword"]);
                        $sqlSelect .= " and (fullname like '%$keyword%' or shortname like '%$keyword%' or bulding like '%$keyword%' or floor like '%$keyword%' or tel like '%$keyword%' or fax like '%$keyword%')";
                      }
                      $sqlSelect .= " Order by id desc";
                      $result = mysqli_query($conn, $sqlSelect);
                      while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row["id"];
                        ?>
                      <tr class="text-center">
                        <td><font size="2"><?php echo ($row["id"]); ?></font></td>
                        <td><font size="2"><?php echo ($row["fullname"]); ?></font></td>
                        <td><font size="2"><?php echo ($row["shortname"]); ?></font></td>
                        <td><font size="2"><?php echo ($row["tel"]); ?></font></td>
                        <td><font size="2"><?php echo ($row["fax"]); ?></font></td>
                        <td><font size="2"><?php echo ($row["bulding"]); ?></font></td>
                        <td><font size="2"><?php echo ($row["floor"]); ?></font></td>
                      </tr>
                          <?php
                          }
                          ?>
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
          </form>
        </div>
        
      </div>
    </div>
    <!-- สิ้นสุดการเขียนตรงนี้ -->
  </div>
  <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

  <!-- Footer -->
  <footer class="sticky-footer bg-white">
   
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
          <h7 class="modal-title" id="exampleModalLabel">Ready to Leave?</h7>
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
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h7 class="modal-title " id="exampleModalLabel">แจ้งเตือน</h7>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-left">
          คุณต้องการลบข้อมูลชำรุด (ครุภัณฑ์) ใช่หรือไม่
          <form id="form-drop" method="post" action="service/service_drop_durable_articles_permits.php">
            <input type="hidden" id="remove-permits" name="permits_id">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
          <button type="button" class="btn btn-danger" onclick="$('#form-drop').submit()">ยืนยันการลบข้อมูล</button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>