<?php
require "service/connection.php";
include 'qrcode/phpqrcode/qrlib.php';
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  QRcode::png("http://192.168.1.213/secretary/view_qrcode_articles.php?id=$id");

}
?>