<?php
include '../elems/init.php';

if (!empty($_SESSION['auth'])){function showPage($link){
if (isset($_GET['edit'])){
  $addId = intval($_GET['edit']);
  if ($addId){

    $query = "SELECT * FROM pages WHERE id = '$addId'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $page = mysqli_fetch_assoc($result);

    if ($page){
      $title = $page['title'];
      $url = $page['url'];
      $text = $page['text'];

      $content = "<form method =\"POST\">
        <p>Enter title:</p>
        <input type = \"text\" name = \"editTitle\" value =\"$title\">
        <p>Enter URL:</p>
        <input type = \"text\" name = \"editUrl\" value =\"$url\">
        <p>Enter TEXT:</p>
        <input type = \"text\" name = \"editText\" value =\"$text\">
        <input type =\"submit\" name =\"submit\" value =\"Добавить страницу\">
      </form>";
    }
    else{
      $content = '<br> Page not found';
    }
  }
}
include 'elems/layout.php';
}

function editPage($link){
  if (isset($_POST['editTitle']) or isset($_POST['editUrl']) or isset($_POST['editText'])){

    $title = mysqli_real_escape_string($link, $_POST['editTitle']);
    $url = mysqli_real_escape_string($link, $_POST['editUrl']);
    $text = mysqli_real_escape_string($link, $_POST['editText']);

    $addId = intval($_GET['edit']);
    $query = "UPDATE pages SET title = '$title', url = '$url', text = '$text' WHERE id = '$addId'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    $_SESSION['message'] = 'Page was updated successfully!';

    }
    else{
      $_SESSION['message'] = '';
    }
}

editPage($link);
showPage($link);
}
else{
  header('Location: /admin/login.php '); die();
}
?>
