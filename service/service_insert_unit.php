<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];

    $sql = "INSERT INTO unit(name)";
    $sql .= " VALUES('$name')";

    if (mysqli_query($conn, $sql)) {
        header('Location: ../insert_unit.php?message=เพิ่มข้อมูลสำเร็จ');
    } else {
        header('Location: ../insert_unit.php?message=เพิ่มข้อมูลไม่สำเร็จ กรุณาลองอีกครั้ง');
    }

} else {

}

?>