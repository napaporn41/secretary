<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['damage_id'])) {
    $damage_id = $_POST["damage_id"];

    $log = "ลบข้อมูลการชำรุดครุภัณฑ์ รหัส " . $damage_id;
    logServer($conn, $log);

    $sqlUpdate = "UPDATE durable_articles_damage SET status = 0 WHERE id = " . $damage_id;
    if (mysqli_query($conn, $sqlUpdate)) {

        $sqlUpdate1 ="UPDATE durable_articles SET status = 1 WHERE id = $damage_id";
        mysqli_query($conn ,$sqlUpdate1);
        header('Location: ../display_durable_articles_damage.php?message=ลบข้อมูลสำเร็จ');

    } else {
        header('Location: ../display_durable_articles_damage.php?message=ลบข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
    }
} else {
    header('Location: ../display_durable_articles_damage.php?message=ข้อมูลผิดพลาด');
}
?>