<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["transfer_out_id"] )) {
    $permitsID = $_POST["transfer_out_id"];
    $sqlUpdate ="UPDATE durable_material_transfer_out SET status = 0 WHERE id = ". $permitsID;

    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../display_durable_material_transfer_out.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_durable_material_transfer_out.php?message=ลบข้อมูลไม่สำเร็จ');
    }

} else {
    header('Location: ../display_durable_material_transfer_out.php?message=ข้อมูลผิดพลาด');
}

?>