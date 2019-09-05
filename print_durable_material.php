<?php
require "service/connection.php";
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $sql = "SELECT m.*, t.name as durable_material_type_name ,un.name as unit_name, se.name as seller_name, se.tel as seller_tel, se.fax as seller_fax, se.address as seller_address ,d.shortname ,d.fullname, d.bulding, d.floor FROM durable_material as m ,durable_material_type as t , seller as se , department as d , unit as un WHERE m.id = $id";
  $sql .= " and m.type = t.id and m.seller_id = se.id and m.department_id = d.id and m.unit = un.id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
}
?>
<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>
  <secretary style="display : none">print_durable_material</secretary>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/secretary.css" rel="stylesheet">

</head>

<body style="padding: 16px">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12" align="center">
        <h7>วัสดุคงทน</h7>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-8">
        <label class="text" for="type">
          <h7>ประเภทวัสดุ :</h7>
        </label>
        <?php echo $row["durable_material_type_name"]; ?>
      </div>
      <div class="text" class="col-sm-">
        <h7>ส่วนราชการ: </h7>
      </div>
      <div class="col-sm-3">
        <h7>สำนักงานตำนวจแห่งชาติ</h7>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-8">
        <label class="text" for="attribute">
          <h7>ลักษณะ/คุณสมบัติ:</h7>
        </label>
        <?php echo $row["attribute"]; ?>
      </div>
      <div class="col-sm-">
        <label class="text" for="short_goverment">
          <div style="width:80px">
            <h7>หน่วยงาน: </h7>
        </label>
      </div>
    </div>
    <div class="col-sm-3">
      <?php echo $row["short_goverment"]; ?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <label class="text" for="code">
        <h7>รหัส :</h7>
      </label>
      <?php echo $row["code"]; ?>
    </div>
    <div class="col-sm-6">
      <label class="text" for="name">
        <h7>รายการวัสดุ :</h7>
      </label>
      <?php echo $row["name"]; ?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <label class="text" for="bill_no">
        <h7>เลขที่ใบเบิก : </h7>
      </label>
      <?php echo $row["bill_no"]; ?>
    </div>
    <div class="col-sm-6">
      <label class="text" for="seller_id">
        <h7>ชื่อผู้ขาย :</h7>
      </label>
      <?php echo $row["seller_name"]; ?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <label class="text" for="shortname">
        <h7>หน่วยงานที่รับผิดชอบ :</h7>
      </label>
      <?php echo $row["shortname"]; ?>
    </div>
    <div class="col-sm-6">
      <label class="text" for="seller_address">
        <h7>ที่อยู่ :</h7>
      </label>
      <?php echo $row["seller_address"]; ?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <label class="text" for="fullname">
        <h7>สถานที่ตั้ง :</h7>
      </label>
      <?php echo $row["fullname"]; ?>/
      <label class="text" for="bulding">อาคาร
      </label>
      <?php echo $row["bulding"]; ?>/
      <label class="text" for="floor">ชั้น
      </label>
      <?php echo $row["floor"]; ?>
    </div>
    <div class="col-sm-6">
      <label class="text" for="seller_tel">
        <h7>โทรศัพท์/FAX :</h7>
      </label>
      <?php echo $row["seller_tel"]; ?>/
      <label class="text" for="seller_fax">
      </label>
      <?php echo $row["seller_fax"]; ?>
    </div>
  </div>
  <style type="text/css" media="print">
    @page {
      size: landscape;
    }
  </style>
  <br>
  <form>
    <div class="row">
      <div class="col-12">
        <div class="table-responsive">
        <table class='border-color-gray' align="center" cellpadding="5" cellspacing="5" border="1" width="100%">
            <thead>
              <tr class="text-center">
                <th>วัน/เดือน/ปี</th>
                <th>เลขที่เอกสาร</th>
                <th>รายการ</th>
                <th>จำนวนหน่วย</th>
                <th>ราคาต่อหน่วย/ชุด/กลุ่ม</th>
                <th>อายุการใช้งาน</th>
                <th>อัตราค่าเสื่อมราคา</th>
                <th>ค่าเสื่อมราคาประจำปี</th>
                <th>ค่าเสื่อมราคาสะสม</th>
                <th>มูลค่าสุทธิ</th>
                <th>หมายเหตุ</th>
              </tr class="text-center">
            </thead>
          </table>
        </div>
      </div>
    </div>
  </form>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>