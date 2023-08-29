<?php
  include("database/db.php");

  $title = "";
  $description = "";
  $image = "";

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $title = $row['title'];
      $description = $row['description'];
      $image = $row['image'];
    }
  }

  if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = getimagesize($_FILES['image']['tmp_name']);
    if($image !== false){
      $image = $_FILES['image']['tmp_name'];
      $img_content = addslashes(file_get_contents($image));
    } else {
      $img_content = "";
    }
  }

  $query = "UPDATE task SET title = '$title', description = '$description', image = '$img_content' WHERE id = $id";
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message-type'] = 'warning';
  header('Location: index.php');

?>