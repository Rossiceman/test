<?php
$data = file_get_contents("php://input", "r");
$mydata = array();
$mydata = json_decode($data, true);


if (isset($mydata["username"]) && isset($mydata["password"]) && isset($mydata["email"]) && isset($mydata['interest'])) {
    if ($mydata["username"] != "" && $mydata["password"] != "" && $mydata["email"] != "") {
        $p_username = $mydata["username"];

        //password_hash("123456",PASSWORD_DEFAULT);
       // $p_password = $mydata["password"];
       $p_password = password_hash($mydata["password"], PASSWORD_DEFAULT);
       $p_email    = $mydata["email"];
       $p_interest = $mydata["interest"];

       if (is_array($mydata["interest"])) {
        $r_interest = implode(",", $mydata["interest"]); // 
    } else {
        $r_interest = ""; // 
    }

        require_once("dbtools.php");
        $link = create_connection();

        $sql = "INSERT INTO test(Username, Password, Email, Interest) VALUES ('$p_username', '$p_password', '$p_email','$p_interest')";
        
        if (execute_sql($link, "testdb", $sql)) {
            echo '{"state" : true, "message" : "註冊成功"}';
        } else {
            echo '{"state" : false, "message" : "註冊失敗"}';
        }
        mysqli_close($link);
    } else {
        echo '{"state" : false, "message" : "欄位不得為空白"}';
    }
} else {
    echo '{"state" : false, "message" : "欄位命名錯誤"}';
}
