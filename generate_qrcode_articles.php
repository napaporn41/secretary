<?php
session_start();
if (!isset($_SESSION["user_type"])) {
  $_SESSION["user_type"] = "99";
}
require "service/connection.php";
if ($_SESSION["user_type"] == "99") {
  session_destroy();
}
include 'qrcode/phpqrcode/qrlib.php';
if (isset($_GET["id"])) {


  $id = $_GET["id"];
    QRcode::png("http://172.20.10.2/secretary/view_qrcode_articles.php?id=$id");
}
?>
