<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['material_id'])) { 
    $materialid = $_POST["material_id"];

    $sqlUpdate = "UPDATE durable_material SET status = 1 WHERE id = " .$materialid;
    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../rowback_durable_material.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../rowback_durable_material.php?message=ลบข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
    }
} else {
        header('Location: ../rowback_durable_material.php?message=ข้อมูลผิดพลาด');
}
?>