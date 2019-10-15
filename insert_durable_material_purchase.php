<!DOCTYPE html>
<html lang="en">
<?php
require "service/connection.php";
?>

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
        <div class="col-8 offset-2">
          <div class="card">
            <div class="card-header card-header-text card-header-danger">
              <div class="card-text">
                <h6 class="m-0 font-weight-bold text-danger">
                  <i class="fas fa-fw fa-city"></i>
                  เพิ่มข้อมูลจัดซื้อ(วัสดุคงทน)
                </h6>
              </div>
            </div>
            <br>
            <div class="card-body">
              <form method="post" action="service/service_insert_durable_material.php" id="form_insert" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="order_no">เลขที่ใบสั่งซื้อ</label>
                      <input type="text" class="form-control" name="order_no" id="order_no" placeholder="no" autofocus>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="purchase_date">วันที่จัดซื้อ</label>
                      <input type="date" class="form-control" name="purchase_date" id="purchase_date" placeholder="purchase_date">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="order_no">ชื่อผู้จัดซื้อ</label>
                      <input type="text" class="form-control" name="order_by" id="order_by" placeholder="order_by">
                    </div>
                  </div>
                  <div class="col-6 ">
                    <div class="form-group">
                      <label for="document_no">เลขที่เอกสาร :</label>
                      <input class="form-control" type="text" placeholder="document_no" name="document_no">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 ">
                    <div class="form-group">
                      <label class="bmd-label-floating">รหัสวัสดุตั้งต้น :</label>
                      <input class="form-control" type="text" placeholder="รหัสวัสดุฑ์ตั้งต้น" name="material_pattern">
                      <small style="color: red"> *ตัวอย่าง: ว.สนง. {run_4}/62</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6 ">
                    <div class="form-group ">
                      <label for="receiver">ชื่อผู้รับ</label>
                      <input type="text" class="form-control" name="receiver" id="receiver" placeholder="receiver">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="receive_date">วันที่ตรวจรับ</label>
                      <input type="date" class="form-control" name="receive_date" id="receive_date" placeholder="receive_date" name="receive_date">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 ">
                    <div class="form-group ">
                      <label for="receive_address">สถานที่จัดส่ง</label>
                      <textarea class="form-control" name="receive_address" id="receive_address" rows="3" placeholder="address" name="address"></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">หน่วยงาน :</label>
                      <input class="form-control" type="text" placeholder="short_goverment" name="short_goverment">
                      <small id="emailHelp" class="form-text text-danger"> *เป็นชื่อหน่วยงาน (ย่อ) ของส่วนราชการ</small>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">เลขสินทรัพย์ :</label>
                      <input class="form-control" type="text" placeholder="asset_no" name="asset_no">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6 ">
                    <div class="form-group bmd-form-group">
                      <label for="exampleFormControlSelect1">ประเภทวัสดุ: </label>
                      <select class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1" name="type">
                        <?php
                        $sqlSelectType = "SELECT * FROM durable_material_type";
                        $resultType = mysqli_query($conn, $sqlSelectType);
                        while ($row = mysqli_fetch_assoc($resultType)) {
                          echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">ลักษณะ/คุณสมบัติ :</label>
                      <input class="form-control" type="text" placeholder="attribute" name="attribute">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6 ">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">ชื่อวัสดุ (คงทน) :</label>
                      <input class="form-control" type="text" placeholder="namemeterial" name="name">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group bmd-form-group">
                      <label for="exampleFormControlSelect1">หน่วยงาน : </label>
                      <select class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1" name="department_id">
                        <?php
                        $sqlSelectType = "SELECT * FROM department";
                        $resultType = mysqli_query($conn, $sqlSelectType);
                        while ($row = mysqli_fetch_assoc($resultType)) {
                          echo '<option value="' . $row["id"] . '">' . "อาคาร" .$row["bulding"] ."ชั้น" .$row["floor"] .'</option>';
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group bmd-form-group">
                      <label for="exampleFormControlSelect1">ร้านค้า : </label>
                      <select class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1" name="seller_id">
                        <?php
                        $sqlSelectType = "SELECT * FROM seller";
                        $resultType = mysqli_query($conn, $sqlSelectType);
                        while ($row = mysqli_fetch_assoc($resultType)) {
                          echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">เลขที่ใบเบิก :</label>
                      <input class="form-control" type="text" placeholder="bill_no" name="bill_no">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-6">
                    <div class="form-group bmd-form-group">
                      <label for="exampleFormControlSelect1">จำนวนปีของวัสดุ :</label>
                      <select class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1" name="durable_year">
                        <option value="0">1</option>
                        <option value="1">2</option>
                        <option value="2">3</option>
                        <option value="3">4</option>
                        <option value="4">5</option>
                        <option value="5">6</option>
                        <option value="6">7</option>
                        <option value="7">8</option>
                        <option value="8">9</option>
                        <option value="9">10</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">จำนวนเงิน :</label>
                      <input class="form-control" type="text" placeholder="price" name="price" id="price">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group bmd-form-group">
                      <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">หน่วยนับ :</label>
                        <select class="form-control" name="unit">
                          <?php
                          $sqlSelectType = "SELECT * FROM unit";
                          $resultType = mysqli_query($conn, $sqlSelectType);
                          while ($row = mysqli_fetch_assoc($resultType)) {
                            echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">จำนวนวัสดุ :</label>
                      <input class="form-control" type="text" placeholder="number" name="number">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-4">
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                      <div class="fileinput-new thumbnail img-raised">
                        <img class="img-thumbnail" src="https://brilliantplus.com/wp_main/wp-content/themes/brilliantplus/images/agent/noimage.png"  alt="..." id="image-preview">
                      </div>
                      <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                      <div>
                        <span class="btn btn-raised btn-round btn-default btn-file">
                        
                          <div class="col-2">
                            <input type="file" name="image" id = "image"/>
                          </div>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-12">
                    <button type="button" class="btn btn-danger btn btn-block " data-toggle="modal" data-target="#exampleModal">
                      บันทึก
                      <div class="ripple-container"></div>
                    </button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">แจ้งเตือน</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            คุณต้องการบันทึกข้อมูลการจัดซื้อวัสดุ (คงทน) ใช่หรือไม่
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                            <button type="button" class="btn btn-danger" onclick="$('#form_insert').submit();">บันทึก</button>
                          </div>
                        </div>
                      </div>
                    </div>
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
  <br>
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
          <div class="row">
            <div class="col-md-10 offset-1">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <nav class="navbar navbar-light bg-light">
                    <h6 class="m-0 font-weight-bold text-danger">
                      <i class="fas fa-file-invoice-dollar"></i> เพิ่มข้อมูลการจัดซื้อ(วัสดุ)</h6>
                    <form class="form-inline">
                      <input class="form-control mr-sm-2" type="search" placeholder="Search" name="keyword" aria-label="Search">
                      <div>
                        <button class="btn btn-outline-danger" type="submit">
                          <i class="fas fa-search"></i>
                        </button>
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
                          <tr class="text-center">
                            <th>#</th>
                            <th>เลขที่ใบสั่งซื้อ</th>
                            <th>วันที่จัดซื้อ</th>
                            <th>ชื่อผู้จัดซื้อ</th>
                            <th>รหัสวัสดุ/th>
                            <th>จำนวน</th>
                            <th>การทำงาน</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $sqlSelect = "SELECT * FROM durable_material_purchase";
                          $sqlSelect .= " WHERE status = 1";
                          if (isset($_GET["keyword"])) {
                            $keyword = $_GET["keyword"];
                            $sqlSelect .= " and (product_id like '%$keyword%' or purchase_date like '%$keyword%')";
                          }
                          // echo $sqlSelect;
                          $result = mysqli_query($conn, $sqlSelect);
                          while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row["id"];
                            ?>

                            <tr class="text-center">
                              <td><?php echo thainumDigit($row["id"]); ?></td>
                              <td><?php echo thainumDigit($row["order_no"]); ?></td>
                              <td><?php echo thainumDigit($row["purchase_date"]); ?></td>
                              <td><?php echo thainumDigit($row["product_id"]); ?></td>
                              <td><?php echo thainumDigit($row["order_by"]); ?></td>
                              <td><?php echo $row["number"]; ?></td>
                              <td class="td-actions text-center">
                                <button type="button" rel="tooltip" class="btn btn-warning">
                                  <i class="fas fa-pencil-alt"></i>
                                </button>

                                <button type="button" rel="tooltip" class="btn btn-success">
                                  <i class="fas fa-clipboard-list"></i>
                                </button>
                                <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" onclick="$('#remove-purchase').val('<?php echo $id; ?>')">
                                  <i class="fas fa-trash-alt"></i>
                                </button>
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
        <script>
          function search() {
            var kw = $("#keyword").val();
            $.ajax({
              url: 'service/service_search_json_durable_material.php',
              dataType: 'JSON',
              type: 'GET',
              data: {
                keyword: kw
              },
              success: function(data) {
                console.log(data);
              },
              error: function(error) {
                console.log(error);
              }
            })
          }
          function readURL(input) {
            if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function(e) {
                $('#image-preview').attr('src', e.target.result);
              }

              reader.readAsDataURL(input.files[0]);
            }
          }

          $("#image").change(function() {
            readURL(this);
          });
        </script>
</body>


</html>