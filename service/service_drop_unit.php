<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["unit_id"] )) {
    $unit_id = $_POST["unit_id"];

    $log = "ลบข้อมูลหน่วยนับ รหัส " . $unit_id ;
    logServer($conn, $log);

    $sqlUpdate ="UPDATE unit SET status = 0 WHERE id = " .$unit_id;
    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../display_unit.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_unit.php?message=ลบข้อมูลไม่สำเร็จ');
    }

} else {
    header('Location: ../display_unit.php?message=ข้อมูลผิดพลาด');
}

?>