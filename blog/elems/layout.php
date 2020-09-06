
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="./style.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div id="wrapper">
      <header>
        <?php include 'header.php'; ?>
      </header>
        <a href ="/">Вернуться на главную </a>
      <main>
        <div class="a"><?php include 'pages.php'; ?> </div>
        <div class="di"><?php echo $content; ?></div>
      </main>


      <footer class="f">
        <p>  flooter <?php echo date('Y'); ?> </p>
      </footer>
    </div>
  </body>
</html>
