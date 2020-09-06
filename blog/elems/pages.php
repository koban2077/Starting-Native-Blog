<?php

function createLink($href, $text, $time, $uri){

  if($href == $uri)
  {
    $class = 'class="active"';
  }
 else
 {
     $class = '';
 }

 echo "<p><a href=\"/$href\"$class>$text</a> $time</p>";
}

$query = "SELECT * FROM pages WHERE url != 'error' ORDER BY id DESC";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
foreach ($data as $elem){
  createLink($elem['url'], $elem['title'], $elem['time'], $uri);
}

?>
