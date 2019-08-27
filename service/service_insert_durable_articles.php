<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //articles
    $number = $_POST["number"];
    $type = $_POST["type"];
    $attribute = $_POST["attribute"];
    $model = $_POST["model"];
    $bill_no = $_POST["bill_no"];
    $budget = $_POST["budget"];
    $department_id = $_POST["department_id"];
    $money_type = $_POST["money_type"];
    $acquiring = $_POST["acquiring"];
    $asset_no = $_POST["asset_no"];
    $d_gen = $_POST["d_gen"];
    $seller_id = $_POST["seller_id"];
    $goverment = "สำนักงานตำรวจแห่งชาติ";
    $unit = $_POST["unit"];
    $price = $_POST["price"];
    $short_goverment = $_POST["short_goverment"];
    //$picture = $_POST["picture"];
    $durable_year = $_POST["durable_year"];
    $storage = $_POST["storage"];
    $articles_pattern = $_POST["articles_pattern"];
    $status = 1;

    //purchase

    $order_no = $_POST["order_no"];
    $purchase_date = $_POST["purchase_date"];
    $seller_id = $_POST["seller_id"];
    $order_by = $_POST["order_by"];
    $receiver = $_POST["receiver"];
    $receive_date = $_POST["receive_date"];
    $receive_address = $_POST["receive_address"];
    
    $pattern = convertPattern($articles_pattern);
    $sqlCheck = "SELECT * FROM durable_articles WHERE code like '$pattern'";
    $resultCheck = mysqli_query($conn, $sqlCheck);
    $numberBefore = mysqli_num_rows($resultCheck);

    for ($i = 0; $i < $number; $i++) {

    $seq= $i +1;
    $code = "";
    if ($numberBefore > 0){
        $len = substr_count($pattern, "_");
        $replacement = "";
        for ($j = 0; $j < $len; $j++){
            $replacement .= "_"; 

        }
        $newCode = str_replace($replacement, autoRun(++$numberBefore, $len), $pattern);
    }else{
        $len = substr_count($pattern, "_");
        $replacement = "";
        for ($j = 0; $j < $len; $j++) { 
            $replacement .= "_";
        }
        $newCode = str_replace($replacement, autoRun($seq, $len), $pattern);
    }

    $sqlInsertArticles = "INSERT INTO durable_articles(code, seq, type, attribute, model, bill_no, budget, department_id,";
    $sqlInsertArticles .= "money_type, acquiring, asset_no, d_gen, seller_id, goverment, unit, price, short_goverment,durable_year, storage , status)";
    $sqlInsertArticles .= " VALUES('$newCode', $seq , $type, '$attribute', '$model', '$bill_no', '$budget', '$department_id', "; 
    $sqlInsertArticles .= " '$money_type', '$acquiring' , '$asset_no', '$d_gen', $seller_id, '$goverment', $unit, $price, '$short_goverment', $durable_year,  '$storage' , $status)";

    mysqli_query($conn ,$sqlInsertArticles) or die(mysqli_error($conn).$sqlInsertArticles); 
    $productID = mysqli_insert_id($conn);

    $sqlInsertPurchase = "INSERT INTO durable_articles_purchase(product_id ,order_no ,purchase_date, seller_id, order_by, receiver, receive_date,receive_address, number,status)";
    $sqlInsertPurchase .= " VALUES($productID, '$order_no', '$purchase_date',$seller_id, '$order_by', '$receiver', '$receive_date' ,'$receive_address' ,$number ,$status)";
    
    mysqli_query($conn ,$sqlInsertPurchase) or die(mysqli_error($conn).$sqlInsertPurchase); 

   }

    header('location: ../display_durable_articles.php');


}else{
    header('location: ../display_durable_articles.php');
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
function autoRun($current, $format) {
    $auto = "";
    $diff = $format - strlen($current);
    for ($i = 0; $i < $diff; $i++) {
      $auto .= "0";
    }
  
    $auto .= $current;
    return $auto;
}

?>
