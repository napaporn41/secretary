<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $seq = $_POST["seq"];
    $repairid = $_POST["repair_id"];
    $fix = $_POST["fix"];
    $price = $_POST["price"];
    $receivedate = $_POST["receive_date"];
    $flag = $_POST["flag"];

    $sql = "INSERT INTO durable_articles_repair_history(seq, repair_id, fix, price, receive_date, flag)";
    $sql .= " VALUES($seq, $repairid, '$fix', $price, '$receivedate', '$flag')";

    $log = "เพิ่มข้อมูลประวัติการซ่อมครุภัณฑ์";
    logServer($conn, $log);
    if (mysqli_query($conn, $sql)) {
        header('Location: ../display_durable_articles_repair_history.php?message=เพิ่มข้อมูลสำเร็จ');
        
    } else {
        header('Location: ../display_durable_articles_repair_history.php?message=เพิ่มข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
    }

} else {

}

?>