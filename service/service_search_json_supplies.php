<?php

require 'connection.php';

if (isset($_GET["keyword"])) {
    $keyword = $_GET["keyword"];
    $thai = thainumDigit($keyword);
    $arabic = arabicnumDigit($keyword);
    $sqlSelect = "SELECT s.*, t.name as tname FROM supplies as s, durable_material_type as t";
    $sqlSelect .= " WHERE s.type = t.id and s.status = 1";
    $sqlSelect .=" and (s.code like '%$thai%' or s.type like '%$thai%' or t.tname like '%$thai%'";
    $sqlSelect .= " or s.code like '%$arabic%' or s.type like '%$arabic%' or t.tname like '%$arabic%')";
    $data = array();
    $result = mysqli_query($conn, $sqlSelect);
    while ($row = mysqli_fetch_assoc($result)) {
        $row["code"] = thainumDigit($row["code"]);
        array_push($data, $row);
    }
    echo json_encode($data);
}

?>