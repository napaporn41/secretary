<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["receive_donate_id"])) {
    $receive_donate_id = $_POST["receive_donate_id"];
    $sqlUpdate = "UPDATE durable_articles_receive_donate SET status = 1 WHERE id = " . $receive_donate_id;
    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../rowback_durable_articles_receive_donate.php?message=ลบข้อมูลสำเร็จ');
    } else {
        header('Location: ../rowback_durable_articles_receive_donate.php?message=ลบข้อมูลไม่สำเร็จ');
    }

    } else {
        header('Location: ../rowback_durable_articles_receive_donate.php?message=ลบข้อมูลผิดพลาด');
    }

?>