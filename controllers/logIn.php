<?php
session_start();
require_once '../DB.php';

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-come']))  {

$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
$pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));


$error = '';

$sql = 'SELECT * FROM `users` WHERE `login` = :login && `pass` = :pass';

$query = $connect->prepare($sql); //подготовка запроса
$query->execute(['login'=>$login, 'pass'=>$pass]);
$user = $query->fetch(PDO::FETCH_ASSOC);
// tt( $user['login']);
if ($user ==0) {

   echo 'Такого пользователя не существует';
}
else {
  $_SESSION['login'] = $user['login'];
  $_SESSION['pass'] = $user['pass'];
    $_SESSION['admin'] = $user['admin'];


header('Location: '. '../');
}


}



// $sql = "SELECT * FROM users WHERE password=$pass AND email=$email ";
//
//
//
//    if ($sql == 1)   {
//
//      $row = mysql_fetch_assoc($sql);
//
//
//               $_SESSION['login'] = $row['login'];
//               $_SESSION['pass'] = $row['pass'];
//
//
//  }
//   else {
//       echo  $error="Ошибка";
//               // header("Location: '../");
//   }
//  }
//
//









 ?>
