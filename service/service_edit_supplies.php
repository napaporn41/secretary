<?php
require 'connection.php';
if (isset($_GET['id'])) {
    //purchase data
    $id = $_GET["id"];
    $orderNo = $_POST["order_no"];
    $purchase_date = $_POST["purchase_date"];
    $orderBy = $_POST["order_by"];
    $receiver = $_POST["receiver"];
    $receive_date = $_POST["receive_date"];
    $receiviceAddress = $_POST["receive_address"];

    $updatePurchase = "UPDATE supplies_purchase SET order_no = '$orderNo',";
    $updatePurchase .= " order_by = '$orderBy', receiver = '$receiver', receive_address = '$receiviceAddress'";
    $updatePurchase .= " WHERE product_id = $id";
    mysqli_query($conn, $updatePurchase) or die("Cannot update purchase: " . mysqli_error($conn));

    //อัฟโหลดรูปภาพ
    $target_dir = "../uploads/";
    $imgeName = $_FILES["image"]["name"];
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    }
    //supplies data

    $shortGoverment = $_POST["short_goverment"];
    $type = $_POST["type"];
    $attribute = $_POST["attribute"];
    $name = $_POST["name"];
    $billNo = $_POST["bill_no"];
    $departmentID = $_POST["department_id"];
    $sellerID = $_POST["seller_id"];
    $unit = $_POST["unit"];
    $price = $_POST["price"];
    $status = $_POST["status"];

    $updateArticl = "UPDATE supplies SET short_goverment = '$shortGoverment',";
    $updateArticl .= " type = $type, attribute ='$attribute', name = '$name' , bill_no = '$billNo' ,department_id = $departmentID ,";
    $updateArticl .= " seller_id = $sellerID , unit = $unit , price = $price , status = $status , picture = '$imgeName'";
    $updateArticl .= " WHERE id = $id";
    mysqli_query($conn, $updateArticl) or die("Cannot update supplies" . mysqli_error($conn));
    header('Location: ../display_supplies.php?message=แก้ไขข้อมูลสำเร็จ');
}
