<?php
require 'connection.php';
if(isset($_GET["id"])) {
    $id = $_GET["id"];

    //receive_donate data
    $seq = $_POST["seq"];
    $repairid = $_POST["repair_id"];
    $price = $_POST["price"];
    $receivedate = $_POST["receive_date"];
    $fix = $_POST["fix"];
    $flag = $_POST["flag"];

    $log = "แก้ไขข้อมูลประวัติการซ่อมวัสดุคงทน รหัส " . $id ;
    logServer($conn, $log);

    $updaterepairhistory = "UPDATE durable_material_repair_history SET seq = $seq,";
    $updaterepairhistory .= " repair_id = $repairid, price = $price, receive_date = '$receivedate', fix = '$fix', flag = '$flag' ";
    $updaterepairhistory .= " WHERE id = $id";
    mysqli_query($conn, $updaterepairhistory) or die("Cannot update repair_history" . mysqli_error($conn));
    header('Location: ../display_durable_material_repair_history.php?message=แก้ไขข้อมูลสำเร็จ');

}
