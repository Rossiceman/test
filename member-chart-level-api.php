<?php

require_once("dbtools.php");
$link = create_connection();
$sql= "SELECT COUNT(Level) AS level_num,Level as level FROM member GROUP BY Level";
$result = execute_sql($link,"testdb",$sql);
$mydata = array();
while($row = mysqli_fetch_assoc($result)){
    $mydata[]= $row;
}
echo '{"state" : true, "data": ' . json_encode($mydata) . ', "message" : "讀取會員等級資料成功!"}';
    mysqli_close($link);

?>