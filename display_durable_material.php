<?php
require "service/connection.php";
$show = 10;
$keyword = "";
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
  <secretary style="display : none">display_durable_material</secretary>

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

    <!-- Sidebar -->
    <?php include "navigation/navbar.php"; ?>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->

    <div class="container-fluid">
      <!-- เริ่มเขียนโค๊ดตรงนี้ -->
      <div class="row">
        <div class="col-12">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <nav class="navbar navbar-light bg-light">
                <h6 class="m-0 font-weight-bold text-danger body-text">
                  <i class="fas fa-business-time"></i> แสดงข้อมูลวัสดุ</h6>
                <form class="form-inline">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" name="keyword" aria-label="Search">
                  <div>
                    <button class="btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="ค้นหาข้อมูล" type="submit">
                      <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-outline-info" data-toggle="tooltip" data-placement="top" title="เพิ่มข้อมูล" type="button" onclick="window.location.href='insert_durable_material_purchase.php';">
                      <i class="fas fa-plus"></i>
                    </button>
                    <button class="btn btn-outline-warning" data-toggle="tooltip" data-placement="top" title="กู้คืนข้อมูล" type="button" onclick="window.location.href='rowback_durable_material.php';">
                      <i class="fas fa-sync-alt"></i>
                    </button>
                    <button type="button" rel="tooltip" class="btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="ปริ้นข้อมูลทั้งหมด" onclick="$('#form-print').submit();">
                      <i class="fas fa-print"></i>
                    </button>
                        <a rel="tooltip" class="btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="ปริ้นคิวอาร์โค้ดทั้งหมด" href="generate_all_qrcode_material.php" target="_blank">
                      <i class="fas fa-qrcode"></i>
                    </a>
                </form>
            </div>
          </div>
          </nav>
          <form>
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-hover ">
                    <thead>
                      <tr class="text-center body-text">
                        <th>ลำดับ</th>
                        <th>รูปภาพ</th>
                        <th>เลขที่ใบเบิก</th>
                        <th>รหัสวัสดุ</th>
                        <th>ประเภท</th>
                        <th>สถานะ</th>
                        <th>การทำงาน</th>
                      </tr class="text-center">
                    </thead>
                    <tbody>
                      <!-- ///ดึงข้อมูล -->
                      <?php
                      //$page = isset($_GET["page"]) ? $_GET["page"] : 1;
                      if (isset($_GET["page"])) {
                        $page = $_GET["page"];
                      } else {
                        $page = 1;
                      }
                      $start = ($page - 1) * $show;
                      $sqlSelect = "SELECT a.*, t.name ,s.status_name,p.purchase_date ,p.number FROM durable_material as a, durable_material_type as t ,status as s ,durable_material_purchase as p";
                      $sqlSelect .= " WHERE a.type = t.id and p.product_id = a.id and a.status = s.id and a.status != 0 and a.status != 6 and a.status != 8 and a.status != 9";
                      if (isset($_GET["keyword"])) {
                        $keyword = arabicnumDigit($_GET["keyword"]);
                        $sqlSelect .= " and (a.code like '%$keyword%' or a.bill_no like '%$keyword%' or p.purchase_date like '%$keyword%' or t.name like '%$keyword%' or a.asset_no like '%$keyword%' or s.status_name like '%$keyword%')";
                      }
                      $count = 1;
                      $sqlSelect .= " Order by a.id desc LIMIT $start, $show";
                      $result = mysqli_query($conn, $sqlSelect);
                      $count = $start + 1;
                      while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row["id"]
                        ?>
                        <tr class="text-center body-text">
                          <td><?php echo $count++; ?></td>
                          <td><img class="img-thumbnail" width="100px" src="uploads/<?php echo $row["picture"]; ?>"></td>
                          <td><?php echo ($row["bill_no"]); ?></td>
                          <td><?php echo ($row["code"]); ?></td>
                          <td><?php echo ($row["name"]); ?></td>
                          <td><?php echo ($row["status_name"]); ?></td>
                          <td class="td-actions text-center">
                            <button type="button" rel="tooltip" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="แก้ไขข้อมูล" onclick="window.location = 'edit_durable_material_purchase.php?id=<?php echo $row['id']; ?>'">
                              <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="ดูรายละเอียดข้อมูล" onclick="window.location = 'view_durable_material.php?id=<?php echo $row['id']; ?>'">
                              <i class="fas fa-clipboard-list"></i>
                            </button>
                            <a rel="tooltip" class="btn btn-primary" style="color: white" data-toggle="tooltip" data-placement="top" title="ปริ้นข้อมูล" href="print_durable_material.php?id=<?php echo $row['id']; ?>" target="_blank">
                              <i class="fas fa-print"></i>
                            </a>
                            <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="ยกเลิกข้อมูล" data-toggle="modal" data-target="#exampleModal" onclick="$('#exampleModal').modal();$('#remove-material').val('<?php echo $id; ?>')">
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
              <?php
              $prevPage = "#";
              if ($page > 1) {
                $prevPage = "?page=" . ($page - 1);
              }

              ?>
              <a class="page-link" href="<?php echo $prevPage; ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <?php
                $sqlSelectCount = "SELECT a.*, t.name ,s.status_name,p.purchase_date ,p.number FROM durable_material as a, durable_material_type as t ,status as s ,durable_material_purchase as p";
                $sqlSelectCount .= " WHERE a.type = t.id and p.product_id = a.id and a.status = s.id and a.status != 0 and a.status != 6 and a.status != 8 and a.status != 9";
                if (isset($_GET["keyword"])) {
                  $keyword = arabicnumDigit($_GET["keyword"]);
                  $sqlSelectCount .= " and (a.code like '%$keyword%' or a.bill_no like '%$keyword%' or p.purchase_date like '%$keyword%' or t.name like '%$keyword%' or a.asset_no like '%$keyword%' or s.status_name like '%$keyword%')";
                }
                $count = 1;
            $sqlSelectCount .= " Order by a.id desc";
            $resultCount = mysqli_query($conn, $sqlSelectCount);
            $total = mysqli_num_rows($resultCount);
            $pageNumber = ceil($total / $show);
            $maxshowpage = $pageNumber;
            $pageNumber = 10;
            $page = 1;
            if (isset($_GET["page"])) {
              $page = $_GET["page"];
              $page == $page = 0 ? 1 : $page;
            }
            $countDiv = intdiv($page - 1, $pageNumber);
            $start_i = ($countDiv * $pageNumber);
            $sectionGroup = (($countDiv * $pageNumber) + $pageNumber);
            $end_i =  $sectionGroup > $maxshowpage ? $maxshowpage : $sectionGroup;

            for ($i = $start_i; $i < $end_i; $i++) {
              if ($i != 0 && $i == $start_i) {
                ?>
                <li class="page-item"><a class="page-link" href="?page=<?php echo ($i); ?>">......</a></li>
              <?php
                }
                if (isset($_GET["keyword"])) {
                  ?>
                <li class="page-item"><a class="page-link" href="?page=<?php echo ($i + 1); ?>&keyword=<?php echo $_GET["keyword"]; ?>"><?php echo ($i + 1); ?></a></li>
              <?php
                } else {
                  ?>
                <li class="page-item"><a class="page-link" href="?page=<?php echo ($i + 1); ?>"><?php echo ($i + 1); ?></a></li>
                <?php
                    if (($i + 1) < $maxshowpage && $i == $end_i - 1) {
                      ?>
                  <li class="page-item"><a class="page-link" href="?page=<?php echo ($i + 2); ?>">......</a></li>
            <?php
                }
              }
            }
            ?>
            <?php
            $nextPage = "#";
            if ($page < $maxshowpage) {

              $nextPage = "?page=" . ($page + 1);
            }

            ?>
            <li class="page-item">
              <a class="page-link" href="<?php echo $nextPage; ?>" aria-label="Next">
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
          <h4 class="modal-title " id="exampleModalLabel">แจ้งเตือน</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-left body-text">
          คุณต้องการยกเลิกข้อมูลวัสดุใช่หรือไม่
          <form id="form-drop" method="post" action="service/service_drop_durable_material.php">
            <input type="hidden" id="remove-material" name="material_id">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary body-text" data-dismiss="modal">ยกเลิก</button>
          <button type="button" class="btn btn-danger body-text" onclick="$('#form-drop').submit()">ยืนยันการยกเลิกข้อมูล</button>
        </div>
      </div>
    </div>
  </div>
  <form action="printall_durable_material.php" method="get" id="form-print" target="_blank">
    <input type="text" name="keyword" value="<?php echo $keyword; ?>" />
  </form>
</body>
<!-- Initialize Bootstrap functionality -->
<script>
  // Initialize tooltip component
  $(function() {
    $('[data-toggle="tooltip"]').tooltip()
  })

  // Initialize popover component
  $(function() {
    $('[data-toggle="popover"]').popover()
  })
</script>

</html>