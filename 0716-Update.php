<?php

$data = file_get_contents("php://input", "r");
$mydata = array();
$mydata = json_decode($data, true);


if (isset($mydata["ID"]) && isset($mydata["name"]) && isset($mydata["price"]) && isset($mydata["num"]) && isset($mydata["remark"])) {
    if ($mydata["ID"] != "" && $mydata["name"] != "" && $mydata["price"] != "" && $mydata["num"] != "" && $mydata["remark"] != "") {



        $p_id = $mydata["ID"];
        $p_name = $mydata["name"];
        $p_price = $mydata["price"];
        $p_num = $mydata["num"];
        $p_remark = $mydata["remark"];

        $servername = "localhost";
        $username = "owner";
        $password = "123456";
        $dbhome = "testdb";

        $conn = mysqli_connect($servername, $username, $password, $dbhome);
        if(!$conn) {
            die("連線失敗" . mysqli_connect_errno());
        }


        $sql = "UPDATE product SET Name = '$p_name',Price = '$p_price',Num = '$p_num',Remark = '$p_remark' WHERE ID = '$p_id'";
        if(mysqli_query($conn, $sql)) {
            echo '{"state": true, "message":"更新成功"}';
        }else{
            echo '{"state": false, "message": "更新失敗或代碼錯誤' . $sql . mysqli_error($conn) .'"}';
        }
        mysqli_close($conn);
    }else{
        echo '{"state": flase, "message": "不得為空白"}';
    }
}else{
    echo '{"state": flase, "message": "欄位名錯誤"}';
}
?>
