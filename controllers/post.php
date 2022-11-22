<?php
session_start();
require_once '../DB.php';


if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-post']))  {
$error ='';

// tt($_POST);

    if (!empty($_FILES['img']['name'])){
        $img = time() . "_" . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        $destination = "../img/" . $img;


        if (strpos($fileType, 'image') === false) {
            $error = "Подгружаемый файл не является изображением!";
        }else{
            $result = move_uploaded_file($fileTmpName, $destination);

            if ($result){
                 $_POST['img'] =$img ;
                 // tt( $img);
            }else{
                $error = "Ошибка загрузки изображения на сервер";
            }
        }
    }else{
        $error= "Ошибка получения картинки";
    }



  $title = trim( $_POST['title']);
  $texton = trim( $_POST['texton']);
  // $imgName = $_POST['img'];

    if (strlen($title) <= 2 ) {
      $error = 'Заголовок должен иметь хотя-бы 2 символа';
    }
    elseif (strlen($texton)<= 5 )  {
      $error = 'У текста должно быть хоть какое-то содержание';
    }
elseif(empty($img)) {
    $error = 'Выберите изображение!';
}

  else {
    $sql = "INSERT INTO `posts`(`title`, `texton`, `img`) VALUES(?,?,?)";

    $query = $connect->prepare($sql);

    $query->execute([$title,$texton,$img]);



 }
}
