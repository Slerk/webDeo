<?php session_start();
require_once 'DB.php';

$sql ='SELECT * FROM `posts` WHERE `id`=:id';
$id =$_GET['id'];
$query = $connect->prepare($sql);
$query->execute(['id' =>$id]);

$article = $query->fetch(PDO::FETCH_OBJ);



if(isset($_POST['username']) && ($_POST['message'])){

     $username = trim(filter_var($_POST['username'],FILTER_SANITIZE_STRING));
     $message = trim(filter_var($_POST['message'],FILTER_SANITIZE_STRING));

     $sql = 'INSERT INTO comment(name,mess,post_id) VALUES(?,?,?)';
     $query = $connect->prepare($sql);
     $query->execute([$username,$message,$id]);

// tt($row);
      if ($id) {
    header("Location: /second.php?id=$id");
      }
    // header("Location:/added.php");
     // exit;
   }
?>
<!DOCTYPE html>
<html lang="ru">

  <head>
    <meta charset="utf-8">
<!-- Подключение бутстрапа начало -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous">
    <!-- Подключение бутстрапа  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Подключение своих стилей начало -->
    <link rel='stylesheet' href='css/style.css'>
      <!-- Подключение своих стилей -->
      <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">


    <title>Татьянин сайт</title>
  </head>
  <!-- ШАПКА -->

      <?php include "include/header.php" ?>
  <!-- ШАПКА -->
  <body>
    <!-- КАРКАС бок и середина -->
    <div class="row">
      <div class="left_colum col-md-2">
<!-- Бок -->


<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action">Разделы</a>
  <a href="#" class="list-group-item list-group-item-action list-group-item-primary">Законодательная база</a>
  <a href="#" class="list-group-item list-group-item-action list-group-item-primary">Судебная власть</a>
  <a href="#" class="list-group-item list-group-item-action list-group-item-primary">Наториальные услуги</a>

</div>


                    <!-- </middle> -->
      </div>

      <div class="center col-md-7">

        <div class="center-content">


           <div class="titlePost col-12 col-md-9">
              <h2>

            <?=$article->title;?>
              </h2>
              <div class="imgPost col-12 col-md-4">
                <img src="/img/<?= $article->img;?>"  alt="postik">
              </div>
               <p> <?=$article->texton;?></p>
           </div>

           <h3 class="mt-5">Комментарии</h3>
           <!-- обработка на этой же странице -->
<?php if(empty($_SESSION['login'])):?>
  <p>Чтобы оставить комментарий,вы должны зарегистрироваться!</p>
<?php else :?>
           <form action="" method='post'>
             <label for="username">Ваше имя</label>
             <!-- дополнительно если пользователь зарегистрирован и мог оставлять коммментарии
             от своего логина,пропишем это в команде куки value="$_COOKIE['log']?>" -->
           <input type="text" name="username" value="<?=$_SESSION['login']?>" id = "username" class="form-control">

           <label for="message">Сообщение</label>
           <textarea name="message"id = "editor" class="form-control"></textarea>
           <input type="submit" name="Добавить комментарий" id = "mes_bot" class="btn btn-success mt-3">

           </form>

<?php endif; ?>
              <?php



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
                 // перенаправление на ту же страницу

               }


                ?>
      </div>

    </div>

        <div class="paste col-md-3">


        </div>
    </div>

<!-- footer -->
    <?php include "include/footer.php" ?>
    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
<script src="../scripts.js"></script>
  </body>
</html>
