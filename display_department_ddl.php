<!DOCTYPE html>
<html lang="en">
<?php
require "service/connection.php";
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $sql = "SELECT * FROM department as d WHERE d.id = $id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
$show = 10;
}
?>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>secretary</title>
  <secretary style="display : none">display_department</secretary>

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
    <div class="dropdown">
      <h5 class="text-dark" align="center">เลือก
        <select id="selected" class="btn btn-danger dropdown-toggle" onchange="selectedDepartment()">
          <option value="1">1 : ข้อมูลครุภัณฑ์</option>
          <option value="2">2 : ข้อมูลวัสดุคงทน</option>
          <option value="3">3 : ข้อมูลวัสดุสิ้นเปลือง</option>
        </select>
        </button>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 offset-2">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <nav class="navbar navbar-light bg-light">
                <h5 class="m-0 font-weight-bold text-danger">
                  <i class="fas fa-city" id="dis"></i></h5>
                <form class="form-inline" id="form-search">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="input-search">
                  <div>
                    <button class="btn btn-outline-danger" type="submit">
                      <i class="fas fa-search"></i>
                    </button>
                    <a rel="tooltip" class="btn btn-outline-primary" href="printall_department.php" target="_blank">
                      <i class="fas fa-print"></i>
                    </a>
                </form>
            </div>
          </div>
          </nav>
          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead id="table-name" align="center">
                    <th scope="col" id="th-1"></th>
                    <th scope="col">คุณสมบัติ/ลักษณะ</th>
                    <th scope="col" id="th-2"></th>
                  </thead>
                  <tbody id="body-content">

                  </tbody>
                </table>
              </div>

            </div>
          </div>
          
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
  <div class="card-body">
            <div class="row">
            <div class="col-md-12" align="center">
                <img class="img-thumbnail" width="800" src="depart/<?php echo $row["pic"]; ?>">
              </div>
          </div>
  </div>
  </div>
  
  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>By &copy; Sirirat Napaporn Bongkotchaporn</span>
      </div>
    </div>
  </footer>
  <!-- End of Footer -->

  <!-- End of Content Wrapper -->

  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

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

  <script>
    var itemPerPage = 10; //จำนวนข้อมูล
    var jsonData;
    var currentPage = 1;
    var maxPage = 1;
    var showPageSection = 10; //จำนวนเลขหน้า
    var numberOfPage;
    $(document).ready(function() {
      selectedDepartment();
      $('#form-search').on('submit', function(e) {
        e.preventDefault();
        selectedDepartment();
      })

    })

    function changePage(page) {
      currentPage = page;
      var item = $('#selected').find(':selected').val();
      var body = $('#body-content');
      var tble = $('#table-name');
      body.empty();
      var max = page * itemPerPage;
      var start = max - itemPerPage;
      if (max > jsonData.length) max = jsonData.length;
      for (let i = start; i < max; i++) {
        const element = jsonData[i];
        var tr = $('<tr class="text-center"></tr>').appendTo(body);
        var code = element["code"];
        var attr = element["attribute"];
        var model = "";
        if (item == 1) {
          model = element["model"];
         } else if (item == 2) {
          model = element["name"];
          } else if(item == 3) {
          model = element["supplies_name"];
        }
        $('<td>' + code + '</td>').appendTo(tr);
        $('<td>' + attr + '</td>').appendTo(tr);
        $('<td>' + model + '</td>').appendTo(tr);
      }

      if (item != 1) {
        $('#th-1').text('รหัสวัสดุ');
        $('#th-2').text('ชื่อวัสดุ');
      } else {

        $('#th-1').text('รหัสครุภัณฑ์');
        $('#th-2').text('รุ่นแบบ');
      }

      if (item != 1) {
        $('#dis').text(' แสดงข้อมูลวัสดุ');
      } else {
        $('#dis').text(' แสดงข้อมูลครุภัณฑ์');
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

    function selectedDepartment() {

      var dep = "<?php echo $_GET["id"]; ?>";
      var item = $('#selected').find(':selected').val();
      var keyword = $('#input-search').val().trim();
      $.ajax({
        url: 'service/service_get_item_by_department.php?dep=' + dep + "&item=" + item + "&keyword=" + keyword,
        dataType: 'JSON',
        success: function(response) {
          jsonData = response;
          numberOfPage = response.length / itemPerPage;
          changePage(1);

        },
        error: function(error) {
          console.log(error);

        }
      })
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
        $('<li class="page-item new-page"><a class="page-link" onclick="changePage(' + (i + 1) + ');">' + thaiNumber(i + 1) + '</a></li>').insertBefore($('#next-page'));
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

    var thaiNum = thaiNumber(12345);
  </script>

</body>

</html>