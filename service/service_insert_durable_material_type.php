<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $shortname = $_POST["shortname"];
        $status = $_POST["status"];

        $sql = "INSERT INTO durable_material_type(name,shortname,status )";
        $sql .= " VALUES('$name', '$shortname', '$status')"; 

        $log = "เพิ่มข้อมูลประเภทวัสดุคงทน ";
        logServer($conn, $log);

        if (mysqli_query($conn, $sql)) {
            header('Location: ../display_durable_material_type.php?message=เพิ่มข้อมูลสำเร็จ');
        } else {
            header('Location: ../display_durable_material_type.php?message=เพิ่มข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
        }

} else {


}
?>