<?php
//{"name":"玲盟紅茶","price":"20","num":"50","remark":"喝林"}

$data = file_get_contents("php://input","r");
$mydata = array();
$mydata = json_decode($data,true);

if(isset($mydata["name"]) && isset($mydata["price"]) && isset($mydata["num"]) && isset($mydata["remark"])){
    if($mydata["name"]!="" && $mydata["price"]!="" && $mydata["num"]!="" && $mydata["remark"]!=""){
        $p_name = $mydata["name"];
        $p_price = $mydata["price"];
        $p_num = $mydata["num"];
        $p_remark = $mydata["remark"];
        
        $servername = "localhost";
        $username = "owner";
        $password = "123456";
        $dbhome = "testdb";
        
        $conn = mysqli_connect($servername, $username, $password, $dbhome);
        if (!$conn) {
            die("連線失敗" . mysqli_connect_error());
        }
        
        $sql = "INSERT INTO product(Name,Price,Num,Remark) VALUES('$p_name','$p_price','$p_num','$p_remark')";
        if (mysqli_query($conn, $sql)) {
            echo '{"state": true,"message":"新增成功"}';
        } else {
            echo '{"state": flase, "message": "新增失敗'.$sql.mysqli_error($conn).'"}';
        }
        
        mysqli_close($conn);
    }else{
        // 這邊的錯誤是指輸出的值，例如:name:abc是abc為空白，這邊還要注意一個，DB所設定的欄位大小，
        // 例如numDB是int那在post輸入的值不能超過int的原先預設值
        echo '{"state": flase, "message": "欄位不得空白"}';
    
    }
}else{
    // 這邊的錯誤是指欄位的值，例如:name:abc是name為空白或輸入錯誤
    echo '{"state": flase, "message": "欄位名錯誤或不得為空白"}';
}





?>