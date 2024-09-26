<?php
$servername ="localhost";
$username = "owner";
$password = "123456";
$dbhome = "testdb";



$conn = mysqli_connect($servername,$username,$password,$dbhome);
if(!$conn){
    die("連線失敗".mysqli_connect_errno());
}

// 撈取資料連json
$sql = "SELECT * FROM product ORDER BY ID DESC";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    // $row = mysqli_fetch_assoc($result);
    // echo "ID:" . $row["ID"] . "Name" . $row["Name"];

    // $row = mysqli_fetch_assoc($result);
    // echIo "D:" . $row["ID"] . "Name:" . $row["Name"];

    $mydata = array();
    while($row = mysqli_fetch_assoc($result)){
        // echo "ID:" . $row["ID"] . "Name" . $row["Name"];
        $mydata[] = $row;
    }
    echo '{"state" : true, "data": '. json_encode($mydata) . ',"message" : "讀取成功"}';
   
}else{
    echo '"state": false, "message": "查無資料"';
}
mysqli_close($conn);
?>
