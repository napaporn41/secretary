<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["seller_id"])) {
    $sellerid = $_POST["seller_id"];
    $sqlUpdate = "UPDATE seller SET status = 1 WHERE id = " . $sellerid;
    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../rowback_seller.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../rowback_seller.php?message=ลบข้อมูลไม่สำเร็จ');
    }
} else {
    header('Location: ../rowback_seller.php?message=ลบข้อมูลผิดพลาด');
}

?>