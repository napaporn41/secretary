<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["purchase_id"])) {
    $purchaseID = $_POST["purchase_id"];

    $sqlSelect = "SELECT * FROM durable_articles_purchase WHERE id = " . $purchaseID;
    $resultSelect = mysqli_query($conn, $sqlSelect);
    $dataSelect = mysqli_fetch_assoc($resultSelect);
    $documentNo = $dataSelect["document_no"];
    $orderNo = $dataSelect["order_no"];

    $sqlFind = "SELECT * FROM durable_articles_purchase WHERE document_no ='$documentNo' and order_no = '$orderNo'";
    $resultFind = mysqli_query($conn, $sqlFind);
    while ($row = mysqli_fetch_assoc($resultFind)) {
        $sqlDrop = "UPDATE durable_articles SET status = 0 WHERE id = " . $row["product_id"];
        mysqli_query($conn, $sqlDrop);
    }


    $sqlUpdate ="UPDATE durable_articles_purchase SET status = 0 WHERE document_no = '$documentNo' and order_no = '$orderNo'";


    $log = "ยกเลิกข้อมูลการจัดซื้อครุภัณฑ์";
    logServer($conn, $log);

    if (mysqli_query($conn, $sqlUpdate)) {
        header('Location: ../display_durable_articles_purchase.php?message=ยกเลิกข้อมูลสำเร็จ');
    } else {
        header('Location: ../display_durable_articles_purchase.php?message=ยกเลิกข้อมูลไม่สำเร็จ');
    }
} else {
    header('Location: ../display_durable_articles_purchase.php?message=ข้อมูลผิดพลาด');
}
