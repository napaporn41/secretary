<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["repair_id"])) {
    $repairid = $_POST["repair_id"];
    $sqlUpdate = "UPDATE durable_articles_repair_history SET status = 1 WHERE id = " . $repairid;

    $log = "กู้คืนข้อมูลประวัติการซ่อมครุภัณฑ์";
    logServer($conn, $log);

    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../rowback_durable_articles_repair_history.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../rowback_durable_articles_repair_history.php?message=ลบข้อมูลไม่สำเร็จ');
    }

    } else {
        header('Location: ../rowback_durable_articles_repair_history.php?message=ลบข้อมูลผิดพลาด');
    }

?>