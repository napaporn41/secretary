<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $shortname = $_POST["shortname"];

        $sql = "INSERT INTO durable_material_type(name,shortname )";
        $sql .= " VALUES('$name', '$shortname')"; 

        
        if (mysqli_query($conn, $sql)) {
            header('Location: ../insert_durable_material_type.php?message=เพิ่มข้อมูลสำเร็จ');
        } else {
            header('Location: ../insert_durable_material_type.php?message=เพิ่มข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
        }

} else {


}
?>