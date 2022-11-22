<?php session_start();

require_once 'DB.php';

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 5;
$offset = $limit * ($page - 1);
// SELECT COUNT(*) as count FROM workers
$sl= "SELECT COUNT(*) as count FROM posts";
$qry = $connect->query($sl);
// подсчет сколько страниц долно получиться.
// ДЕлим количество постов на количество которых должно быть на странице
// потом округляем с помощью роуда
$count = round ($qry->fetchColumn() / $limit,0) ;
// tt($count);

// $total= $qres->fetchColum();
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
                   <a href="#" class="list-group-item list-group-item-action list-group-item-dark">Разделы</a>
                   <a href="#" class="list-group-item list-group-item-action list-group-item-dark">Законодательная база</a>
                   <a href="#" class="list-group-item list-group-item-action list-group-item-dark">Судебная власть</a>
                   <a href="#" class="list-group-item list-group-item-action list-group-item-dark">Наториальные услуги</a>

                 </div>


                    <!-- </middle> -->
      </div>

      <div class="center col-md-7">
        <div class="MiddleTitle">

        <h2>Статьи</h2>
        </div>
        <div class="center-content">

<?php
    // require_once 'DB.php';
    $sql = "SELECT * FROM `posts`  ORDER BY `id` DESC LIMIT $limit OFFSET $offset";
    $query = $connect->query($sql);

     while ($row = $query->fetch(PDO::FETCH_OBJ)):

    ?>
                <div class="titlePost col-12 col-md-9">
                   <h2>
                     <!-- <a href='/news.php?id=$row->id' title='$row->title'> -->
                  <a href="/second.php?id=<?=$row->id;?> "><?=$row->title;?></a>
                   </h2>
                   <div class="imgPost col-12 col-md-4">
                     <img src="/img/<?= $row->img;?>"  alt="postik">
                   </div>
                    <p> <?=substr($row->texton, 0 , 116) . "...";?></p>
                </div>

<?php  endwhile; ?>


      </div>
<?php include "include/pagination.php";?>
    </div>

        <div class="paste col-md-3">
          <div class="button-place">


<?php if(isset($_SESSION['login'])) : ?>
  <div class="namePlace">
     <?php echo 'Добро пожаловать' . ' ' . $_SESSION['login'];  ?>
</div>
  <form class="button-out" action="controllers/logOut.php" method="post">
    <button   type="submit" class="btn btn-success">Выйти</button>

  </form>
<?php if($_SESSION['admin'] == 10) : ?>
  <form class="button-post" action="forms/addPost_form.php" method="post">
    <button   type="submit" class="btn btn-success">Добавить статью</button>

  </form>
<?php endif; ?>
<?php else:?>
  <form class="button-reg" action="forms/reg_form.php" method="post">
    <button   type="submit" class="btn btn-success">Зарегистрироваться</button>

  </form>
  <form class="button-come" action="forms/comeIn_form.php" method="post">
    <button   type="submit" class="btn btn-success">Войти</button>

  </form>
<?php endif; ?>
             <!-- <form class="button-reg" action="forms/reg_form.php" method="post">
               <button   type="submit" class="btn btn-success">Зарегистрироваться</button>

             </form> -->
<?php

  ?>
             <!-- <form class="button-post" action="forms/addPost_form.php" method="post">
               <button   type="submit" class="btn btn-success">Добавить статью</button>

             </form> -->
             <?php //endif;

              ?>
             </div>
        </div>
    </div>

<!-- footer -->
    <?php include "include/footer.php" ?>

    <?php //if($_SESSION['admin'] ==1 ) :
    //  tt($_SESSION)
      ?>

  </body>
</html>
