<?php
require_once dirname(__FILE__)."/db_check.php";

$query = [
  'password' => htmlspecialchars($_GET["password"]),
  'newpassword' => htmlspecialchars($_GET["newpassword"]),
];
$conn = db_check();
updateData($query['username'], $query['password'], $query['newpassword'], $conn);


function updateData($username, $password, $newpassword, $conn) {
  
  $sql = "SELECT username FROM user_account WHERE  password = '$password'";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) == 0) {
    echo "密碼錯誤";
    header("Location: /php_project_demo/views/reset.php?error=帳號密碼錯誤");   
  } 
  else
  {
    $sql1 = "UPDATE user_account SET password='$newpassword' WHERE password='$password'";
    if (mysqli_query($conn, $sql1)) {
      echo "資料新增成功";
      header("Location: /php_project_demo/views/login.php");   
    } else {
      echo "Error: " . $sql1 . "<br>" . $conn->error;
    }  
  }
}
$conn->close();
