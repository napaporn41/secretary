<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $document = $_POST["document_no"];
        $productId = $_POST["product_id"];
        $transferto =$_POST["transfer_to"];
        $transferdate = $_POST["transfer_date"];
        $flag = $_POST["flag"];

        $log = "เพิ่มข้อมูลการโอนออกวัสดุสิ้นเปลือง";
        logServer($conn, $log);

        $sql = "INSERT INTO durable_material_transfer_out(document_no ,product_id ,transfer_to ,transfer_date, flag)";
        $sql .= " VALUES($document, $productId , '$transferto', '$transferdate', '$flag')"; 

        if (mysqli_query($conn, $sql)) {
            header('Location: ../display_durable_material_transfer_out.php?message=เพิ่มข้อมูลสำเร็จ');
            $sqlUpdate ="UPDATE durable_material SET status = 6 WHERE id = $productId";
            mysqli_query($conn ,$sqlUpdate);
        } else {
            header('Location: ../display_durable_material_transfer_out.php?message=เพิ่มข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
        }

} else {


}
?>