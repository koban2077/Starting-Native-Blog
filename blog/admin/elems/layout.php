<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="./styles.css">
    <meta charset="utf-8">
    <title> <?php echo $title; ?> </title>
  </head>
  <body>
    <div id = "wrapper">
      <header>
        <?php include 'header.php'; ?>
      </header>
      <main>
        <a href ="/admin/add.php">Добавить новую страницу </a>
        <a href ="/admin/">Вернуться на главную </a>
    <?php echo '<br>'; include 'info.php'; ?>
    <?php echo $addForm; ?>
    <?php echo $table; ?>
    <?php echo $content; ?>
      </main>
      <footer>
          flooter <?php echo date('Y'); ?>
      </footer>
    </div>
  </body>
</html>
