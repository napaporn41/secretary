<?php
require "service/connection.php";
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> ecf79b56c200a23970e76e78fe878325dff8176d

if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $sql = "SELECT a.*, t.name as durable_articles_type_name ,un.name as unit_name, se.name as seller_name, d.shortname ,d.fullname FROM durable_articles as a ,durable_articles_type as t , seller as se , department as d , unit as un WHERE a.id = $id";
  $sql .= " and a.type = t.id and a.seller_id = se.id and a.department_id = d.id and a.unit = un.id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  //   $depPerYear = ($row["price"] - 1) / $row["durable_year"];
  //   $depPerMonth = ($row["price"] - 1) / $row["durable_year"] / 12;
  //   echo "Year :" . + number_format($depPerYear, 2, '.', '') . "<br>";
  //   echo "Month :" . + number_format($depPerMonth, 2, '.', '');
} 
<<<<<<< HEAD
=======
=======
>>>>>>> 80dcae7f541e58c594ea5a105cd3d06f41634148
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT a.*, t.name as durable_articles_type_name ,un.name as unit_name, se.name as seller_name, d.shortname ,d.fullname FROM durable_articles as a ,durable_articles_type as t , seller as se , department as d , unit as un WHERE a.id = $id";
    $sql .= " and a.type = t.id and a.seller_id = se.id and a.department_id = d.id and a.unit = un.id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

<<<<<<< HEAD
}
=======
    // $depPerYear = ($row["price"] - 1) / $row["durable_year"];

    // $depPerMonth = $depPerYear / 12;
    // echo "year: " . +number_format($depPerYear, 2, '.', '') . "<br>";
    // echo "month: " . +number_format($depPerMonth, 2, '.', '');



}
>>>>>>> d388a24d09d45b5c9fe63c2d5db5f961280f5612
>>>>>>> 80dcae7f541e58c594ea5a105cd3d06f41634148
>>>>>>> ecf79b56c200a23970e76e78fe878325dff8176d
?>

<!DOCTYPE html>
<html lang="en">

<head>

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> ecf79b56c200a23970e76e78fe878325dff8176d
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>
  <secretary style="display: none">display_durable_articles</secretary>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/secretary.css" rel="stylesheet">
<<<<<<< HEAD
=======
=======
>>>>>>> 80dcae7f541e58c594ea5a105cd3d06f41634148
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>
    <secretary style="display: none">display_durable_articles</secretary>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/secretary.css" rel="stylesheet">
<<<<<<< HEAD
    <link href="qrcode/qrlib.php" rel="stylesheet">
=======
>>>>>>> d388a24d09d45b5c9fe63c2d5db5f961280f5612
>>>>>>> ecf79b56c200a23970e76e78fe878325dff8176d

>>>>>>> 80dcae7f541e58c594ea5a105cd3d06f41634148
</head>

<body id="page-top">

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
  <!-- Page Wrapper -->
  <div id="wrapper">

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- เริ่มเขียนโค๊ดตรงนี้ -->
      <div class="row">
        <div class="col-md-10 offset-1">
          <div class="card shadow mb-4">
            </div>
          </div>
          </nav>
          <form>
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="card" align="center">
                    <img class="card-img-top" src="./img/bg.jpg">
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-dark" for="code">รหัส : </label>
                      <?php echo $row["code"]; ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label class="text-dark" for="model">รุ่นแบบ : </label>
                      <?php echo $row["model"]; ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label class="text-dark" for="attribute">ลักษณะ/คุณสมบัติ : </label>
                      <?php echo $row["attribute"]; ?>
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
  <div class="modal fade" id="modal-QR" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">QR Code สำหรับ <?php echo $row["code"];?> </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body ">

        <img src="generate_qrcode_articles.php?id=<?php echo $row["id"];?>">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
          <button type="button" class="btn btn-danger" onclick="$('#form_insert').submit();">บันทึก</button>
        </div>
      </div>
    </div>
  </div>

=======
>>>>>>> 80dcae7f541e58c594ea5a105cd3d06f41634148
>>>>>>> ecf79b56c200a23970e76e78fe878325dff8176d
    <!-- Page Wrapper -->
    <div id="wrapper">



        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- เริ่มเขียนโค๊ดตรงนี้ -->
            <div class="row">
<<<<<<< HEAD
                <div class="col-md-10 offset-1">
                    <div class="card shadow mb-4">
                    </div>
                    </nav>
                    <form>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card" align ="center">
                                        <img class="card-img-top" src="./img/bg.jpg">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="text-dark" for="code">รหัส : </label>
                                        <?php echo $row["code"]; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="text-dark" for="model">รุ่นแบบ : </label>
                                        <?php echo $row["model"]; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="text-dark" for="attribute">ลักษณะ/คุณสมบัติ : </label>
                                        <?php echo $row["attribute"]; ?>
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
=======
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <form>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="card" align="center">
                                                <img class="card-img-top" src="./img/bg.jpg">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label class="text-dark" for="code">รหัส : </label>
                                                    <?php echo $row["code"]; ?>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <label class="text-dark" for="model">รุ่นแบบ : </label>
                                                    <?php echo $row["model"]; ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="text-dark" for="attribute">ลักษณะ/คุณสมบัติ : </label>
                                                    <?php echo $row["attribute"]; ?>
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
>>>>>>> 80dcae7f541e58c594ea5a105cd3d06f41634148


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
<<<<<<< HEAD


=======
>>>>>>> 80dcae7f541e58c594ea5a105cd3d06f41634148
    <div class="modal fade" id="modal-QR" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
<<<<<<< HEAD
                    <h5 class="modal-title" id="exampleModalLabel">QR Code สำหรับ <?php echo $row["code"]; ?></h5>
=======
                    <h5 class="modal-title" id="exampleModalLabel">QR Code สำหรับ <?php echo $row["code"]; ?> </h5>
>>>>>>> 80dcae7f541e58c594ea5a105cd3d06f41634148
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
<<<<<<< HEAD
                <div class="modal-body" align="center">
                    <img src="generate_qrcode_articles.php?id=<?php echo $id; ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <button type="button" class="btn btn-danger" onclick="$('#form_insert').submit();">ดาวโหลด</button>
=======
                <div class="modal-body ">

                    <img src="generate_qrcode_articles.php?id=<?php echo $row["id"]; ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <button type="button" class="btn btn-danger" onclick="$('#form_insert').submit();">บันทึก</button>
>>>>>>> 80dcae7f541e58c594ea5a105cd3d06f41634148
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> d388a24d09d45b5c9fe63c2d5db5f961280f5612
>>>>>>> 80dcae7f541e58c594ea5a105cd3d06f41634148
>>>>>>> ecf79b56c200a23970e76e78fe878325dff8176d
</body>

</html>