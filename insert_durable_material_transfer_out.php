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
  <secretary style="display: none">display_durable_material_transfer_out</secretary>

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
        <div class="col-md-6 offset-3">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-danger body-text">
                <i class="fas fa-box-open"></i> เพิ่มข้อมูลการโอนออก(วัสดุคงทน)</h6>
            </div>

            <div class="card-body">
              <form method="post" action="service/service_insert_durable_material_transfer_out.php" id="form_insert">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group body-text">
                      <label for="document_no">เลขที่เอกสาร</label>
                      <input type="text" class="form-control" name="document_no" id="document_no" placeholder="" autofocus>
                      <small id="alert-document_no" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group body-text">
                      <label for="transfer_date">วันที่โอน</label>
                      <input type="date" class="form-control" name="transfer_date" id="transfer_date" placeholder="">
                      <small id="alert-transfer_date" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 ">
                    <div class="form-groupbody-text">
                      <label for="product_id">รหัสวัสดุ</label>
                      <div class="row">
                        <div class="col-md-10 ">
                          <select class="form-control" name="product_id" id="product_id">
                            <?php
                            $sqlSelectType = "SELECT * FROM durable_material WHERE status != 0 and status != 2 and status != 3 and status != 4 and status != 8 and status != 9 and status != 10";
                            $resultType = mysqli_query($conn, $sqlSelectType);
                            while ($row = mysqli_fetch_assoc($resultType)) {
                              echo '<option value="' . $row["id"] . '">' . $row["code"] . '</option>';
                            }
                            ?>
                          </select>
                        </div>
                        <div class="col-md-2">
                          <button class="btn btn-outline-danger" type="button" data-toggle="modal" data-target="#modal-form-search" onclick="search()">
                            <i class="fas fa-search"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 ">
                    <div class="form-group body-text">
                      <label for="transfer_to">ชื่อผู้โอนให้</label>
                      <input type="text" class="form-control" name="transfer_to" id="transfer_to" placeholder="">
                      <small id="alert-transfer_to" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group body-text">
                      <label for="flag">หมายเหตุ</label>
                      <textarea class="form-control" name="flag" id="flag" rows="3" placeholder=""></textarea>
                      <small id="alert-flag" style="color: red; display: none">*กรุณากรอกข้อมูล</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <button type="button" class="btn btn-danger btn-md btn-block body-text" aria-pressed="false" autocomplete="off" onclick="validateData();">
                      บันทึก
                    </button>
                  </div>
                </div>
              </form>
            </div>
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
  <div class="modal fade" id="modal-form-search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title " id="exampleModalLabel">แจ้งเตือน</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-left">
          <div class="row">
            <div class="col-12">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <nav class="navbar navbar-light bg-light">
                    <h6 class="m-0 font-weight-bold text-danger body-text">
                      <i class="fas fa-business-time"></i> แสดงข้อมูล(วัสดุคงทน)</h6>
                    <form class="form-inline" id="form-search">
                      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="input-search">
                      <div>
                        <button class="btn btn-outline-danger" type="submit">
                          <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
              </div>
              </nav>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table class="table table-hover ">
                      <thead>
                        <tr class="text-center body-text">
                          <td>รูปภาพ</td>
                          <td>เลขที่ใบเบิก</td>
                          <td>รหัสวัสดุ</td>
                          <td>ประเภท</td>
                          <td>การทำงาน</td>
                        </tr class="text-center">
                      </thead>
                      <tbody id="modal-material-body">
                        <!-- ///ดึงข้อมูล -->
                        <?php
                        //$page = isset($_GET["page"]) ? $_GET["page"] : 1;


                        $sqlSelect = "SELECT a.*, t.name FROM durable_material as a, durable_material_type as t";
                        $sqlSelect .= " WHERE a.type = t.id and a.status != 0 and a.status != 2 and a.status != 3 and a.status != 4 and a.status != 8 and a.status != 9 and a.status != 10";
                        if (isset($_GET["keyword"])) {
                          $keyword = arabicnumDigit($_GET["keyword"]);
                          $sqlSelect .= " and (a.code like '%$keyword%' or a.bill_no like '%$keyword%' or t.name like '%$keyword%')";
                        }
                        $result = mysqli_query($conn, $sqlSelect);
                        while ($row = mysqli_fetch_assoc($result)) {
                          $id = $row["id"]
                          ?>
                          <tr class="text-center body-text">
                            <td><img class="img-thumbnail" width="100px" src="uploads/<?php echo $row["picture"]; ?>"></td>
                            <td><?php echo ($row["bill_no"]); ?></td>
                            <td><?php echo ($row["code"]); ?></td>
                            <td><?php echo ($row["name"]); ?></td>
                            <td class="td-actions text-center">
                              <button type="button" rel="tooltip" class="btn btn-success" onclick="selectedmaterial(<?php echo $row["id"]; ?>);">
                                <i class="fas fa-check"></i>
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
            </div>
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center" id="pagination">
                <li class="page-item" id="prev-page">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item" id="next-page">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
      </div>
    </div>
  </div>
  </div>
  <script>
    var itemPerPage = 10; //จำนวนข้อมูล
    var jsonData;
    var currentPage = 1;
    var maxPage = 1;
    var showPageSection = 10; //จำนวนเลขหน้า
    var numberOfPage;
    $('#form-search').on('submit', function(e) {
      e.preventDefault();
      search();
    })

    function search() {
      var keyword = $('#input-search').val().trim();
      $.ajax({
        url: 'service/service_search_json_durable_material_transfer_out.php?keyword=' + keyword,
        dataType: 'JSON',
        type: 'GET',
        success: function(data) {
          jsonData = data;
          numberOfPage = data.length / itemPerPage;
          changePage(1);
        },
        error: function(error) {
          console.log(error);
        }
      })
    }

    function changePage(page) {
      currentPage = page;

      var body = $('#modal-material-body');
      body.empty();
      var max = page * itemPerPage;
      var start = max - itemPerPage;
      if (max > jsonData.length) max = jsonData.length;
      for (let i = start; i < max; i++) {
        const item = jsonData[i];
        //console.log(item);
        var tr = $('<tr class="text-center"></tr>').appendTo(body);
        var picture = item["picture"];
        var bill_no = item["bill_no"];
        var code = item["code"];
        var type = item["name"];
        $('<td><img class="img-thumbnail" width="100px" src="uploads/' + picture + '"></td>').appendTo(tr);
        $('<td>' + (bill_no) + '</td>').appendTo(tr);
        $('<td>' + (code) + '</td>').appendTo(tr);
        $('<td>' + (type) + '</td>').appendTo(tr);
        $('<td class="td-actions text-center"><button type="button" rel="tooltip" class="btn btn-success"onclick="selectedmaterial(' + item.id + ');"><i class="fas fa-check"></i></button></td>').appendTo(tr);
        generatePagination();

      }
    }

    function nextPage() {
      if (currentPage < maxPage) {
        currentPage = currentPage + 1;
        changePage(currentPage);

      }
    }

    function prevPage() {
      if (currentPage > 1) {
        currentPage = currentPage - 1;
        changePage(currentPage);
      }
    }

    function generatePagination() {
      $('#pagination').empty();
      $('<li class="page-item" id="prev-page"> <a class="page-link" href="#" onclick="prevPage();" aria-label="Previous"> <span aria-hidden="true">&laquo;</span> <span class="sr-only">Previous</span> </a> </li>').appendTo($('#pagination'));
      $('<li class="page-item" id="next-page"> <a class="page-link" href="#" onclick="nextPage();" aria-label="Next"> <span aria-hidden="true">&raquo;</span> <span class="sr-only">Next</span> </a> </li>').appendTo($('#pagination'));
      $('new-page').removeClass();
      maxPage = numberOfPage;

      var countDiv = parseInt((currentPage - 1) / showPageSection);
      var start_i = (countDiv * showPageSection);
      var sectionGroup = ((countDiv * showPageSection) + showPageSection);
      var end_i = sectionGroup > maxPage ? maxPage : sectionGroup;

      for (let i = start_i; i < end_i; i++) {
        if (i != 0 && i == start_i) {
          $('<li class="page-item new-page"><a class="page-link" onclick="changePage(' + (i) + ');">' + ("......") + '</a></li>').insertBefore($('#next-page'));
        }
        $('<li class="page-item new-page"><a class="page-link" onclick="changePage(' + (i + 1) + ');">' + (i + 1) + '</a></li>').insertBefore($('#next-page'));
        if ((i + 1) < maxPage && i == end_i - 1) {
          $('<li class="page-item new-page"><a class="page-link" onclick="changePage(' + (i + 2) + ');">' + ("......") + '</a></li>').insertBefore($('#next-page'));
        }
      }

    }

    function thaiNumber(num) {
      var array = {
        "1": "๑",
        "2": "๒",
        "3": "๓",
        "4": "๔",
        "5": "๕",
        "6": "๖",
        "7": "๗",
        "8": "๘",
        "9": "๙",
        "0": "๐"
      };
      var str = num.toString();
      for (var val in array) {
        str = str.split(val).join(array[val]);
      }
      return str;
    }

    function selectedmaterial(id) {
      $('#modal-form-search').modal('hide');
      $('#product_id').val(id);
    }

    function validateData() {
      var document_no = $('#document_no').val();
      var transfer_date = $('#transfer_date').val();
      var transfer_to = $('#transfer_to').val();
      var flag = $('#flag').val();
      var validateCount = 0;
      if ($.trim(document_no) == "") {
        validateCount++;
        $('#document_no').focus();
        $('#document_no').addClass('border border-danger');
        $('#alert-document_no').show();
      } else {
        $('#document_no').removeClass('border border-danger');
        $('#alert-document_no').hide();
      }
      if ($.trim(transfer_date) == "") {
        validateCount++;
        $('#transfer_date').addClass('border border-danger');
        $('#alert-transfer_date').show();
      } else {
        $('#transfer_date').removeClass('border border-danger');
        $('#alert-transfer_date').hide();
      }
      if ($.trim(transfer_to) == "") {
        validateCount++;
        $('#transfer_to').addClass('border border-danger');
        $('#alert-transfer_to').show();
      } else {
        $('#transfer_to').removeClass('border border-danger');
        $('#alert-transfer_to').hide();
      }
      if ($.trim(flag) == "") {
        validateCount++;
        $('#flag').addClass('border border-danger');
        $('#alert-flag').show();
      } else {
        $('#flag').removeClass('border border-danger');
        $('#alert-flag').hide();
      }
      if (validateCount > 0) {


      } else {
        $('#exampleModal').modal();
      }
    }
  </script>

</body>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">แจ้งเตือน</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body body-text">
        คุณต้องการบันทึกข้อมูลการโอนออกวัสดุใช่หรือไม่
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary body-text" data-dismiss="modal">ยกเลิก</button>
        <button type="button" class="btn btn-danger body-text" onclick="$('#form_insert').submit();">บันทึก</button>
      </div>
    </div>
  </div>
</div>

</html>