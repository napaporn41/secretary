<?php
require "service/connection.php";
$show = 10;
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
  <secretary style="display : none">display_supplies_request</secretary>

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
                <h6 class="m-0 font-weight-bold text-danger body-text"><i class="fas fa-archive"></i> แสดงข้อมูลการร้องขอ (วัสดุสิ้นเปลือง)</h6>
                <form class="form-inline">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" name="keyword" aria-label="Search">
                  <div>
                    <button class="btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="ค้นหาข้อมูล" type="submit">
                      <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-outline-info" data-toggle="tooltip" data-placement="top" title="แสดงข้อมูล" type="button" onclick="window.location.href='display_supplies.php';">
                      <i class="fas fa-clipboard-list"></i>
                    </button>
                    <a rel="tooltip" class="btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="ปริ้นข้อมูลทั้งหมด" href="printall_supplies.php" target="_blank">
                      <i class="fas fa-print"></i>
                    </a>
                </form>
            </div>
          </div>
          <form>
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-hover body-text">
                    <thead>
                      <tr class="text-center">
                        <th>ลำดับ</th>
                        <th>รูปภาพ</th>
                        <th>เลขที่ใบเบิก</th>
                        <th>รหัสวัสดุ</th>
                        <th>ชื่อวัสดุ</th>
                        <th>ประเภทการร้องขอ</th>
                        <th>สถานะ</th>
                        <th class="text-center">การทำงาน</th>
                      </tr>
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
                      $userID = $_SESSION["user_id"];
                      $sqlSelect = "SELECT s.*, ss.supplies_name FROM supplies_request as s, supplies_stock as ss";
                      $sqlSelect .= " WHERE s.supplies_id = ss.id and s.status != 0"; //and s.status_request = 'waiting_approve'
                      if ($_SESSION["user_type"] == 2) {
                        $sqlSelect .= " and s.user_request = $userID";
                      }
                      if (isset($_GET["keyword"])) {
                        $keyword = $_GET["keyword"];
                        $sqlSelect .= " and (s.code like '%$keyword%' or ss.type like '%$keyword%' or ss.supplies_name like '%$keyword%')";
                      }
                      // echo $sqlSelect;
                      $sqlSelect .= " Order by s.id LIMIT $start, $show";
                      $result = mysqli_query($conn, $sqlSelect);
                      $count = $start + 1;

                      while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row["id"];
                        $statusRequest = "";
                        $actionRequest = "";
                        switch ($row["status_request"]) {
                          case "waiting_approve":
                            $statusRequest = "<p style='color: #ffb300'>รอการอนุมัติ</p>";
                            break;
                          case "approved":
                            $statusRequest = "<p style='color: green'>อนุมัติแล้ว</p>";
                            break;
                          case "rejected":
                            $statusRequest = "<p style='color: red'>ปฎิเสธการร้องขอ</p>";
                            break;
                        }
                        switch ($row["action_request"]) {
                          case "request_update":
                            $actionRequest = "ร้องขอการแก้ไข";
                            break;
                          case "request_delete":
                            $actionRequest = "ร้องขอการลบข้อมูล";
                            break;
                        }
                        ?>
                            <tr class="text-center">
                              <td><?php echo $count++; ?></td>
                              <td><img class="img-thumbnail" width="100px" src="uploads/<?php echo $row["picture"]; ?>"></td>
                              <td><?php echo ($row["bill_no"]); ?></td>
                              <td><?php echo ($row["code"]); ?></td>
                              <td><?php echo ($row["supplies_name"]); ?></td>
                              <td><?php echo $actionRequest; ?></td>
                              <td><?php echo $statusRequest; ?></td>
                              <td class="td-actions text-center">
                                <button type="button" rel="tooltip" data-toggle="tooltip" data-placement="top" title="ดูขรายละเอียด้อมูล" data-toggle="tooltip" data-placement="top" title="ดูข้อมูลเพิ่มเติม" class="btn btn-info" onclick="window.location = 'view_supplies_purchase_request.php?id=<?php echo $row['id']; ?>'">
                                  <i class="far fa-eye"></i>
                                </button>
                                <?php if ($_SESSION["user_type"] == 1 && $row["status_request"] == "waiting_approve") { ?>
                                  <button type="button" rel="tooltip" title="ไม่อนุมัติ" data-toggle="tooltip" data-placement="top" title="ลบข้อมูล" class="btn btn-danger" onclick="showDialogReject(<?php echo $row["id"]; ?>);">
                                    <i class="far fa-times-circle"></i>
                                  </button>
                                <?php }; ?>
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
            $sqlSelectCount = "SELECT s.*, ss.supplies_name FROM supplies_request as s, supplies_stock as ss";
            $sqlSelectCount .= " WHERE s.supplies_id = ss.id and s.status != 0";
            if (isset($_GET["keyword"])) {
              $keyword = $_GET["keyword"];
              $sqlSelectCount .= " and (s.code like '%$keyword%' or ss.type like '%$keyword%' or ss.supplies_name like '%$keyword%')";
            }
            if ($_SESSION["user_type"] == 2) {
              $sqlSelectCount .= " and s.user_request = " . $_SESSION["user_id"];
            }
            $sqlSelectCount .= " Order by s.id desc";
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
<div class="modal fade" id="modal-reject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ยืนยันการปฎิเสธ</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">* กรุณาระบุเหตุผลในการปฎิเสธ: </div>
      <div class="col-12">
        <div>
          <input type="hidden" value="" id="temp-id">
          <textarea class="form-control" id="reject-reason" cols="30" rows="10"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
        <button class="btn btn-danger" type="button" data-dismiss="modal" onclick="rejectRequest();">ยืนยัน</button>
      </div>
    </div>
  </div>
</div>

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

  function showDialogReject(id) {
    $('#temp-id').val(id);
    $('#modal-reject').modal();
  }

  function rejectRequest() {
    var id = $('#temp-id').val();
    var url = "service/service_reject_request.php?id=" + id;
    var reason = $('#reject-reason').val();
    if (reason != "") {
      $.ajax({
        url: url,
        dataType: 'JSON',
        type: 'POST',
        data: {
          reason: reason
        },
        success: function(data) {
          window.location = "display_supplies_request.php";
        }
      })
    } else {
      alert('กรุณาระบเหตุผล');
    }
  }
</script>

</html>