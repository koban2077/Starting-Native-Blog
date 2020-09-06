<?php
include '../elems/init.php';

if (!empty($_SESSION['auth'])){

  $addForm = "<form method =\"POST\">
  <p>Enter title:</p>
  <input type = \"text\" name = \"title\">
  <p>Enter URL:</p>
  <input type = \"text\" name = \"url\">
  <p>Enter TEXT:</p>
  <input type = \"text\" name = \"text\">
  <input type =\"submit\" name =\"submit\" value =\"Добавить страницу\">
</form>";

function addPage($link){
  if (isset($_POST['title']) and isset($_POST['url']) and isset($_POST['text'])){
    $title = mysqli_real_escape_string($link, $_POST['title']);
    $url = mysqli_real_escape_string($link, $_POST['url']);
    $text = mysqli_real_escape_string($link, $_POST['text']);
    $time = date("Y.m.d H:i:s ");

    $query = "SELECT COUNT(*) as count FROM pages WHERE url='$url'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $isPage = mysqli_fetch_assoc($result)['count'];

    if($isPage)
      {
        $_SESSION['message'] = 'Page with this url already exists';
      }
    else
      {

        $query = "INSERT INTO pages (title,url,text, time) VALUES ('$title', '$url', '$text', '$time')";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $_SESSION['message'] = 'Page was added successfully';
        header('Location: /admin/ '); die();
      }
    }
}
addPage($link);
include 'elems/layout.php';
}
else{
  header('Location: /admin/login.php '); die();
}
?>
