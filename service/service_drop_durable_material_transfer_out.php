<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["transfer_out_id"] )) {
    $transfer_outID = $_POST["transfer_out_id"];
    $sqlUpdate ="UPDATE durable_material_transfer_out SET status = 0 WHERE id = ". $transfer_outID;

    $log = "ลบข้อมูลการโอนออกวัสดุคงทน รหัส " . $transfer_outID;
    logServer($conn, $log);

    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../display_durable_material_transfer_out.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_durable_material_transfer_out.php?message=ลบข้อมูลไม่สำเร็จ');
    }

} else {
    header('Location: ../display_durable_material_transfer_out.php?message=ข้อมูลผิดพลาด');
}

?>