<?php
require 'connection.php';
if(isset($_GET["id"])) {
    $id = $_GET["id"];

    //purchase data
    $product_id = $_POST["product_id"];
    $book_no = $_POST["book_no"];
    $permit_date = $_POST["permit_date"];
    $receivedate = $_POST["receive_date"];
    $flag = $_POST["flag"];
    
    $updatepermit = "UPDATE durable_articles_permits SET product_id = '$product_id',";
    $updatepermit .= " book_no = '$book_no', permit_date = '$permit_date', receive_date = '$receivedate', flag = '$flag'";
    $updatepermit .= " WHERE id = $id";
  
    mysqli_query($conn, $updatepermit) or die("Cannot update permits". mysqli_error($conn));
    header('Location: ../display_durable_articles_permits.php?message=แก้ไขข้อมูลสำเร็จ');
}
