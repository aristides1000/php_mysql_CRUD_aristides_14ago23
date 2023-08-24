<?php
  session_start();

  $conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'php_mysql_crud_aristides_23ago23'
  ) or die(mysqli_error($mysqli));
?>