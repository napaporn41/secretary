<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["permits_id"] )) {
    $permitsID = $_POST["permits_id"];
    
    $sqlUpdate ="UPDATE supplies_permits SET status = 0 WHERE id = ". $permitsID;

    $log = "ลบข้อมูลการยืม-คืนวัสดุสิ้นเปลือง รหัส " . $permitsID;
    logServer($conn, $log);

    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../display_supplies_permits.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_supplies_permits.php?message=ลบข้อมูลไม่สำเร็จ');
    }
} else {
    header('Location: ../display_supplies_permits.php?message=ข้อมูลผิดพลาด');
}

?>