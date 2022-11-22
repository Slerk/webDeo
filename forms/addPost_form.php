<?php
session_start();
    include "../controllers/post.php";

 ?>
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
     <link rel='stylesheet' href='../css/style.css'>
       <!-- Подключение своих стилей -->

       <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">

     <title>Татьянин сайт</title>
   </head>
   <!-- ШАПКА -->
   <header>
     <div class="imaIcon">

         <img src="../img/title.jpg" alt="Шапка">
     </div>

         <div class="main row ">
           <a class="main-link" href="../index.php">Главная</a>
           <a class="main-about" href="#">О нас</a>
           <a class="main-conta" href="#">Контакты</a>
             </div>
   </header>
   <!-- ШАПКА -->
<div class="container post_form">
  <?  ?>
    <form action="addPost_form.php" method="post" class="row justify-content-center" enctype='multipart/form-data'>
      <div class="Post_A">

        <h2>Добавление статьи</h2>
          </div>
        <div class="mb-3 col-12 col-md-4 err">
            <p><?=$error?></p>
        </div>

        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-6">
          <div class="Zag">
            <label for="title">Заголовок</label>

          </div>
          <input type="text" name="title" id="title" class="form-control">
        </div>

        <div class="w-100"></div>
        <div class=" mb-3 col-12 col-md-8">
          <div class="Soder">
            <label for="texton">Содержание</label>

          </div>
          <textarea type="text" name="texton" id="editor" class="form-control" ></textarea>
        </div>

        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
              <input name="img"  type="file" class="form-control" id="img">
          </div>

        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">

    </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
          <div class="but-post">
            <button type="submit" class="btn btn-secondary" name="button-post">Добавить</button>

          </div>

        </div>
    </form>
</div>



<!-- END FORM -->
<?php include "../include/footer.php" ?>
<script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
<script src="../scripts.js"></script>
</html>
