<?php
include '../elems/init.php';

if (isset($_POST['password']) and md5($_POST['password']) == '202cb962ac59075b964b07152d234b70'){
  $_SESSION['auth'] = true;
  $_SESSION['message'] = 'Welcome!';
    header('Location: /admin/'); die();
}
else

{?>
  <form method="POST">
    <input type = "password" name = "password">
    <input type = "submit">
  </form

<?php } ?>
