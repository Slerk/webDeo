<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="?page=1">В начало</a></li>
<?php

for ($i = 1; $i <= $count; $i++){
echo "<a href=?page=$i>&nbsp $i &nbsp </a>";
}
    // for($i=1;$i<=$page;$i++) {
    //   echo '<a href="?page='.$i*$page.'">'.$i."</a>\n";
    // }
    ?>

    <!-- <li class="page-item"><a class="page-link" href="?page=1">1</a></li>
    <li class="page-item"><a class="page-link" href="?page=2">2</a></li> -->

    <li class="page-item"><a class="page-link" href="?page=<?php echo $count ?>">В конец</a></li>
  </ul>
</nav>
