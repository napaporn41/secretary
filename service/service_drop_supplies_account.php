<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['account_id'])) {
    $id = $_POST["id"];
    $account_id = $_POST["account_id"];
    $sqlUpdate = "UPDATE supplies_account SET status = 0 WHERE id = " . $account_id;
    
    $log = "ยกเลิกข้อมูลการแจกจ่ายวัสดุสิ้นเปลือง";
    logServer($conn, $log);

    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../display_supplies_account.php?message=ยกเลิกข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_supplies_account.php?message=ยกเลิกข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
    }
} else {
    header('Location: ../display_supplies_account.php?message=ข้อมูลผิดพลาด');
}
