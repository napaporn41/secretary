<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["repair_id"])) {
    $repairid = $_POST["repair_id"];
    $sqlUpdate = "UPDATE durable_material_repair SET status = 1 WHERE id = " . $repairid;

    $log = "กู้คืนข้อมูลการซ่อมวัสดุคงทน รหัส " . $repairid ;
    logServer($conn, $log);

    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../rowback_durable_material_repair.php?message=กู้ข้อมูลสำเร็จ');
    } else {
        header('Location: ../rowback_durable_material_repair.php?message=กู้ข้อมูลไม่สำเร็จ');
    }

    } else {
        header('Location: ../rowback_durable_material_repair.php?message=กู้ข้อมูลผิดพลาด');
    }

?>