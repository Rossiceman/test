<?php
//時間戳記
echo time();
echo '<br>';
echo date("Ymdhis");
echo '<br>';

//md5
echo md5('123456');
echo '<br>';

//uniqid
echo "uniqid(): " . uniqid();
echo '<br>';
echo "uniqid():" . uniqid(time());
echo '<br>';

//hash雜湊
echo "hash('md5', time()):" .hash('md5',time());
echo '<br>';
echo "hash('sha256', time()):" .hash('sha256',time());
echo '<br>';
echo "hash('sha512', time()):" .hash('sha512',time());
echo '<br>';

//password_hash("密碼",演算法)
echo 'password_hash("123456",PASSWORD_DEFAULT):' . password_hash("123456",PASSWORD_DEFAULT);
//驗證密碼
$hash01 = '$2y$10$B1pwrJi5rWlWbmAYliDPROjLAI4RVnuE12w4cV8EGQ2uW7VHHTyky';
if(password_verify('123456',$hash01))
{
    echo "密碼正確";
}else{
    echo "密碼錯誤";
}
?>