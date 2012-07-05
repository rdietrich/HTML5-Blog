<?php include('auth.php');

   mysql_connect('localhost', 'root') OR die ('Verbindung nicht Erfolgt!');
   mysql_select_db('rd_html_db') OR die ('Diese Datenbank existiert nicht!');

$sql = sprintf('INSERT INTO `rd_html_db`.`articles` (`Date`, `headline`, `text`, `article_img`) VALUES (NOW(), "%s", "%s", "%s")', $_POST['headline'], $_POST['text'], "");


if (isset($_POST['publish'])){

   mysql_query($sql);
   print_r($_POST);
}


?>
<!DOCTYPE html>
<html>
 <head>
  <title>HTML 5 Backend Stuff</title>
  <link rel="stylesheet" type="text/css" href="backend.css" />
 </head>
 <body>
    <div class="maindiv">
       <div class="main_nav">
           <nav>
              <a href="index.php">Home</a>
              <a href="articles.php">Artikel</a>
              <a href="comments.php">Kommentare</a>
              <a href="logout.php">logout</a>
              <a href="http://localhost/phpmyadmin">PHPMyAdmin</a>
              <a href="http://localhost/www/test-proj/HTML5-CSS3/index.php">Frontend</a>
           </nav>
       </div>
       <div id="preview_box">
          <h1><?php echo $_POST['headline'] ?></h1>
          <article class="preview_article">
             <? 
               echo $_POST['text'];
             ?>
          </article>
          <form id="prev_form" method="post" action="prev.php">
             <?php foreach($_POST as $key => $value): ?>
             <input type="hidden" name='<?php echo $key; ?>' value='<?php echo $value; ?>' /><?php endforeach; ?>
             <input type="submit" value="Veröffentlichen" name="publish" id="publish" />
             <a href="javascript:history.back()">Zurück zum Bearbeiten</a>
          </form>
       </div>
    </div>
 </body>
</html>