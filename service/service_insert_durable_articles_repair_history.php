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

    if (mysqli_query($conn, $sql)) {
        echo "Insert data complete";
    } else {
        echo $sql . "<br/>";
        echo mysqli_error($conn);
    }

} else {

}

?>