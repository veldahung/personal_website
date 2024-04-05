<?php
//清除session和cookie導回登入頁
session_start();//啟用Session功能
session_destroy();//清除所有session

//清除cookie，將過期時間定為之前的時間即可清除
setcookie("user","",time()-3600,"/");  //將時間設定成過去的時間

header("Location: /php_project_demo/views/menu.php"); // 將網址導回主頁
?>