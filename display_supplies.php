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

  <title>Dashboard</title>
  <secretary style="display : none">display_supplies</secretary>

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

    <!-- Sidebar -->

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->

    <div class="container-fluid">
      <!-- เริ่มเขียนโค๊ดตรงนี้ -->
      <div class="row">
        <div class="col-md-12">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <nav class="navbar navbar-light bg-light justify-content-between">
                <h6 class="m-0 font-weight-bold text-danger"><i class="fas fa-archive"></i> แสดงข้อมูล(วัสดุสิ้นเปลือง)</h6>

                <form class="form-inline">
                  <div>
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" name="keyword" aria-label="Search">
                    <button class="btn btn-outline-danger my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                    <button class="btn btn-outline-info" type="button" onclick="window.location.href='insert_supplies.php';">
                      <i class="fas fa-plus"></i>
                    </button>
                    <button class="btn btn-outline-warning" type="button" onclick="window.location.href='rowback_supplies.php';">
                      <i class="fas fa-sync-alt"></i>
                    </button>
                    <button class="btn btn-outline-primary" type="button" onclick="window.location.href='rowback_supplies.php';">
                      <i class="fas fa-print"></i>
                    </button>
                </form>
            </div>
          </div>
          <form>
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-hover ">
                    <thead>
                      <tr class="text-center">
                        <th>#</th>
                        <th>ลำดับ</th>
                        <th>เลขที่ใบเบิก</th>
                        <th>ชื่อวัสดุ</th>
                        <th>ประเภทวัสดุ</th>
                        <th class="text-center">การทำงาน</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- ///ดึงข้อมูล -->
                      <?php
                      $sqlSelect = "SELECT s.*, t.name FROM supplies as s, durable_material_type as t";
                      $sqlSelect .= " WHERE s.type = t.id and s.status = 1";
                      if (isset($_GET["keyword"])) {
                        $keyword = $_GET["keyword"];
                        $sqlSelect .= " and (s.code like '%$keyword%' or s.type like '%$keyword%' or t.name like '%$keyword%')";
                      }
                      //echo $sqlSelect;
                      $result = mysqli_query($conn, $sqlSelect);
                      while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row["id"]
                        ?>
                      <tr class="text-center">
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["seq"]; ?></td>
                        <td><?php echo $row["bill_no"]; ?></td>
                        <td><?php echo thainumDigit($row["code"]); ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td class="td-actions text-center">
                          <button type="button" rel="tooltip" class="btn btn-warning" onclick="window.location = 'edit_supplies.php?id=<?php echo $row['id']; ?>'">
                            <i class="fas fa-pencil-alt"></i>
                          </button>
                          <button type="button" rel="tooltip" class="btn btn-success">
                            <i class="fas fa-clipboard-list"></i>
                          </button>
                          <button type="button" rel="tooltip" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-print"></i>
                      </button>
                          <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" onclick="$('#remove-supplies').val('<?php echo $id; ?>')">
                            <i class="fas fa-trash-alt"></i>
                          </button>
                        </td>
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
        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
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

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title " id="exampleModalLabel">แจ้งเตือน</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-left">
          คุณต้องการลบข้อมูลวัสดุใช่หรือไม่
          <form id="form-drop" method="post" action="service/service_drop_supplies.php">
            <input type="hidden" id="remove-supplies" name="supplies_id">
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