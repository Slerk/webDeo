<?php


session_start();
// require_once '../DB.php';



if(isset($_POST['username']) && ($_POST['message'])){

     $username = trim(filter_var($_POST['username'],FILTER_SANITIZE_STRING));
     $message = trim(filter_var($_POST['message'],FILTER_SANITIZE_STRING));

     $sql = 'INSERT INTO comment(name,mess,post_id) VALUES(?,?,?)';
     $query = $connect->prepare($sql);
     $query->execute([$username,$message,$id]);


   }



   //вывод комментариев
   $sql = 'SELECT * FROM `comment` WHERE `post_id` = :id ORDER BY `id`DESC';

   $query = $connect->prepare($sql);
   $query->execute([$id]);

   $comments = $query->fetchAll(PDO::FETCH_OBJ);

   foreach ($comments as $key) {
   echo "<div class='alert alert-info mb-2'>
   <h4>$key->name</h4>
   <p>$key->mess</p>
   </div>";
   //
   // if ($_POST != 0) {
   //   $_POST = array();
   // }
   // перенаправление на ту же страницу
   //header("Location:../forms/coment_form.php");
   // exit;

 }

 // header("Location:".$_SERVER['PHP_SELF']);
 // exit;
 // if (isset($_POST['token'])) {
 //     if ($_POST['token'] == $_SESSION['formToken']) {
 //         // ошибка: повторная отправка формы
 //     } else {
 //         $_SESSION['formToken'] = $_POST['token'];
 //         // обрабатываем форму
 //     }
 // }

  ?>
