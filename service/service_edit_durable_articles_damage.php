<?php
require 'connection.php';
if (isset($_GET['id'])) {
    $id = $_GET["id"];

    //damage data
    $productId = $_POST["product_id"];
    $damage_date = $_POST["damage_date"];
    $flag = $_POST["flag"];

    $updateDamage = "UPDATE durable_articles_damage SET product_id = '$product_id',";
    $updateDamage .= " damage_date = '$damage_date',  flag = '$flag'";
    $updateDamage .= " WHERE id = $id";

    mysqli_query($conn, $updateDamage) or die("Cannot update damage: ". mysqli_error($conn));
    header('Location: ../display_durable_articles_damage.php?message=แก้ไขข้อมูลสำเร็จ');
}
