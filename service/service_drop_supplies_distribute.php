<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['distribute_id'])) {
    $distribute_id = $_POST["distribute_id"];
    $sqlUpdate = "UPDATE supplies_distribute SET status = 0 WHERE id = " . $distribute_id;
    
    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../display_supplies_distribute.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_supplies_distribute.php?message=ลบข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
    }
} else {
    header('Location: ../display_supplies_distribute.php?message=ข้อมูลผิดพลาด');
}
