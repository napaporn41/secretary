<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $productId = $_POST["product_id"];
        $orderno = $_POST["order_no"];
        $purchasedate = $_POST["purchase_date"];
        $sellerid = $_POST["seller_id"];
        $orderby = $_POST["order_by"];
        $receiver = $_POST["receiver"];
        $receivedate = $_POST["receive_date"];
        $receiveaddress = $_POST["receive_address"];
        $number = $_POST["number"];

        $sql = "INSERT INTO durable_articles_purchase(product_id ,order_no ,purchase_date ,seller_id ,order_by ,receiver ,receive_date ,receive_address ,number )";
        $sql .= " VALUES($productId ,'$orderno' ,'$purchasedate' ,$sellerid ,'$orderby' ,'$receiver' ,'$receivedate' ,'$receiveaddress' ,$number)"; 

        
        if (mysqli_query($conn, $sql)) {
            echo "Insert data complete";
        } else {
            echo "Can't insert data, please check this:" . mysqli_error($conn);
        }

} else {


}
?>