<?php session_start();

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
                   <a href="#" class="list-group-item list-group-item-action">Таблица</a>
                   <a href="#" class="list-group-item list-group-item-action list-group-item-primary">тут будут пункты</a>
                   <a href="#" class="list-group-item list-group-item-action list-group-item-primary">тут будут пункты</a>
                   <a href="#" class="list-group-item list-group-item-action list-group-item-primary">тут будут пункты</a>

                 </div>


                    <!-- </middle> -->
      </div>

      <div class="center col-md-7">
        <div class="MiddleTitle">

        <h2></h2>
        </div>
        <div class="center-content">


<h2>Ваш комментарий был успшешно добавлен! </h2>

      </div>

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
