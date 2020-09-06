<?php
include 'elems/init.php';


$uri = trim(preg_replace('#(\?.*)?#','',$_SERVER['REQUEST_URI']), '/');
var_dump($uri);
if (empty($uri)){
$uri ='/';
}

$query = "SELECT * FROM pages WHERE url ='$uri'";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$data = mysqli_fetch_assoc($result);



$title = $data['title'];
$content = $data['text'];

include 'elems/layout.php';

?>
