<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Material

    $number = $_POST["number"];
    $type = $_POST["type"];
    $name = $_POST["name"];
    $attribute = $_POST["attribute"];
    $bill_no = $_POST["bill_no"];
    $department_id = $_POST["department_id"];
    $seller_id = $_POST["seller_id"];
    $goverment     = "สำนักงานตำรวจแห่งชาติ";
    $unit = $_POST["unit"];
    $price = $_POST["price"];
    $short_goverment = $_POST["short_goverment"];
    //$picture = $_POST["picture"];
    $durable_year = $_POST["durable_year"];
    $asset_no = $_POST["asset_no"];
    $assetNoArray = explode(",", $asset_no);
    $materialPattern = $_POST["material_pattern"];
    $status = 1;
    $asset_no = $_POST["asset_no"];

    $log = "เพิ่มข้อมูลวัสดุคงทน";
    logServer($conn, $log);

    //อัฟโหลดรูปภาพ
    $target_dir = "../uploads/";
    $imgeName = $_FILES["image"]["name"];
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    }

    //purchase
    $order_no = $_POST["order_no"];
    $purchase_date = $_POST["purchase_date"];
    $seller_id = $_POST["seller_id"];
    $order_by = $_POST["order_by"];
    $receiver = $_POST["receiver"];
    $receive_date = $_POST["receive_date"];
    $receive_address = $_POST["receive_address"];
    $document_no = $_POST["document_no"];


    $pattern = convertPattern($materialPattern);
    $sqlCheck = "SELECT * FROM durable_material WHERE code Like '$pattern'";
    $resultCheck = mysqli_query($conn, $sqlCheck);
    $numberBefore = mysqli_num_rows($resultCheck);

    if ($number > 0) {
        for ($i = 0; $i < $number; $i++) {

            $seq = $i + 1;
            $code = "";
            if ($numberBefore > 0) {
                $len = substr_count($pattern, "_");
                $replacement = "";
                for ($j = 0; $j < $len; $j++) {
                    $replacement .= "_";
                }
                $newCode = str_replace($replacement, autoRun(++$numberBefore, $len), $pattern);
            } else {
                $len = substr_count($pattern, "_");
                $replacement = "";
                for ($j = 0; $j < $len; $j++) {
                    $replacement .= "_";
                }
                $newCode = str_replace($replacement, autoRun($seq, $len), $pattern);
            }
            $runAsset = $asset_no++;

            $sqlCheck = "SELECT * FROM durable_material WHERE code = '$newCode'";
            $resultCheck = mysqli_query($conn, $sqlCheck);
            if (mysqli_num_rows($resultCheck) == 0) {

                $sqlInsertMaterial = "INSERT INTO durable_material ( seq, code, type, attribute, bill_no, department_id, ";
                $sqlInsertMaterial .= " seller_id, goverment, unit, price, short_goverment, durable_year , asset_no , name , picture)";
                $sqlInsertMaterial .= " VALUES($seq,'$newCode', $type, '$attribute', '$bill_no', $department_id ,";
                $sqlInsertMaterial .= " $seller_id, '$goverment', $unit, $price, '$short_goverment', $durable_year , '$runAsset', '$name','$imgeName')";

// echo $sqlInsertMaterial;
                mysqli_query($conn, $sqlInsertMaterial) or die(mysqli_error($conn));
                $productID = mysqli_insert_id($conn);

                $sqlInsertPurchase = "INSERT INTO durable_material_purchase (product_id, order_no, purchase_date, seller_id, order_by, receiver, receive_date, receive_address, number, document_no)";
                $sqlInsertPurchase .= " VALUES($productID, '$order_no', '$purchase_date' , $seller_id, '$order_by','$receiver', '$receive_date', '$receive_address', $number, $document_no)";

                mysqli_query($conn, $sqlInsertPurchase) or die(mysqli_error($conn));
                header('location: ../display_durable_material_purchase.php');
            } else {
                header('location: ../insert_durable_material_purchase.php?message=รหัสครุภัณฑ์ซ้ำ');
                break;
            }
        }
    } else {
        header('location: ../display_durable_material.php');
    }
} else {
    header('location: ../display_durable_material.php');
}

function convertPattern($pattern)
{
    $len = substr_count($pattern, "{");
    for ($i = 0; $i < $len; $i++) {
        $posA = strpos($pattern, "{");
        $posB = strpos($pattern, "}");
        $founded = substr("$pattern", $posA, 7);
        $command = str_replace("{", "", $founded);
        $command = str_replace("}", "", $command);
        $command = explode("_", $command);
        if (count($command) == 2) {
            $runTotal = $command[1];
            $underNum = "";
            for ($j = 0; $j < $runTotal; $j++) {
                $underNum .= "_";
            }
            $pattern = str_replace($founded, $underNum, $pattern);
        } else {
        }
    }
    return $pattern;
}

function autoRun($current, $format)
{
    $auto = "";
    $diff = $format - strlen($current);

    for ($i = 0; $i < $diff; $i++) {
        $auto .= "0";
    }
    $auto .= $current;
    return $auto;
}
