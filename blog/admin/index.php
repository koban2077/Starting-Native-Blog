<?php
include '../elems/init.php';

if (!$page){
  $query = "SELECT * FROM pages WHERE url ='error'";
  $result = mysqli_query($link, $query) or die(mysqli_error($link));
  $page = mysqli_fetch_assoc($result);

  header("HTTP/1.0 404 Not Found");
}

$title = $page['title'];





if (!empty($_SESSION['auth'])){

  function showPageTable($link){
  $query = "SELECT id, title, url FROM pages";
  $result = mysqli_query($link, $query) or die(mysqli_error($link));
  for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

  $table = "<table> <tr>
                <th> id </th>
                <th> title </th>
                <th> url </th>
                <th> edit </th>
                <th> delete </th>
                </tr>";
  foreach ($data as $elem){
    $table .= '<tr>';
    $table .= "<td> {$elem['id']} </td>";
    $table .= "<td> {$elem['title']} </td>";
    $table .= "<td> {$elem['url']} </td>";
    $table .= "<td><a href=\"/admin/edit.php?edit={$elem['id']}\"> edit </td>";
    $table .= "<td><a href=\"?del={$elem['id']}\"> delete </td>";

    $table .= '</tr>';
  }

  $table .= '</table>';

include 'elems/layout.php';
}

function delPage($link){
  if (isset($_GET['del'])){
    $delId = intval($_GET['del']);

    if($delId)
    {
      $query = "DELETE FROM pages WHERE id = '$delId'";
      $result = mysqli_query($link, $query) or die(mysqli_error($link));

      $_SESSION['message'] = 'Page was deleted successfully';

    }
  }
}
delPage($link);
showPageTable($link);
}
else{
  header('Location: /admin/login.php '); die();
}
?>
