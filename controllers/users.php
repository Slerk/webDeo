<?php
session_start();
require_once '../DB.php';

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg']))  {
$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
$pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));
$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_STRING));
 $admin = 1;

// tt($_POST);
$error ='';


  if (strlen($login) <= 5 ) {
    $error = 'Логин должен быть больше 5 символов';
  }
  elseif (strlen($pass)<= 5 )  {
    $error = 'Пароль должен быть больше 5 символов';
  }
  elseif (strlen($email)<= 2 )  {
    $error = 'Введите адрес';
  }

else {
  $sql = 'INSERT INTO `users`(`login`, `pass`, `email`,`admin`) VALUES(?,?,?,?)';
  $query = $connect->prepare($sql);
  $query->execute([$login,$pass,$email,$admin]);
// $user = $query->fetch(PDO::FETCH_ASSOC);

  // $sel = "SELECT * FROM `users` WHERE login= '$login'";




    $_SESSION['login'] = $_POST['login'];
    $_SESSION['pass'] = $_POST['pass'];
    // $_SESSION['admin'] =  $_POST['admin'] ;


        header('Location: '. '../');

}

// $sel = "SELECT * FROM `users` WHERE id= '$id'";
//
// if ($id['admin'] ==10) {
//   $_SESSION['admin'] =  $id['admin'];
// }

}





 ?>
