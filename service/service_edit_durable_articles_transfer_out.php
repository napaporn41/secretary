<?php
require 'connection.php';
if(isset($_GET["id"])) {
    $id = $_GET["id"];

    //purchase data
    $product_id = $_POST["product_id"];
    $document_no = $_POST["document_no"];
    $transfer_date = $_POST["transfer_date"];
    $transfer_to = $_POST["transfer_to"];
    $flag = $_POST["flag"];
    $updatepermit = "UPDATE durable_articles_transfer_out SET document_no = '$document_no',";
    $updatepermit .= " document_no = $document_no, transfer_date = '$transfer_date', transfer_to = '$transfer_to', flag = '$flag'";
    $updatepermit .= " WHERE id = $id";
  
    $log = "แก้ไขข้อมูลการโอนออกครุภัณฑ์ รหัส " . $id ;
    logServer($conn, $log);

    mysqli_query($conn, $updatepermit) or die("Cannot update transfer_out". mysqli_error($conn));
    header('Location: ../display_durable_articles_transfer_out.php?message=แก้ไขข้อมูลสำเร็จ');
}
