<?php 
require 'connection.php';
if(isset($_GET['id'])) {
    //donate data
    $id = $_GET["id"];
    $documentNo = $_POST["document_no"];
    $receiveDate = $_POST["receive_date"];
    $productId = $_POST["product_id"];
    $donateName = $_POST["donate_name"];
    $flag = $_POST["flag"];

    $updateDonate = "UPDATE durable_articles_donate SET document_no = '$documentNo',";
    $updateDonate .= " receive_date = '$documentNo', product_id = '$productId', ";
    $updateDonate .= " donate_name = '$donateName', flag = '$flag'";
    $updateDonate .= " WHERE id = $id";
    mysqli_query($conn, $updateDonate) or die("Cannot update donate: " . mysqli_error($conn));

    header('Location: ../display_durable_articles_donate.php?message=แก้ไขข้อมูลสำเร็จ');
}
?>