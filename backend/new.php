<html>
 <head>
  <title>HTML 5 Backend Stuff</title>
  <link rel="stylesheet" type="text/css" href="backend.css" />
  <meta charset="UTF-8">
  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
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
        <div id="new_article">
           <h3>Schreibe einen neuen Artikel</h3>
           <form id="new_article" action="prev.php" method="POST" name="New Form">
              <label for="headline" >Überschrift: </label><input type="text" name="headline" id="headline" placeholder="Überschrift" />
              <textarea id="text" name="text">
              &lt;p&gt;Initial value.&lt;/p&gt;  
              </textarea>
              <script type="text/javascript">
	             CKEDITOR.replace( 'text' );
              </script>
              <input type="submit" name="submit" id="submit" value="Weiter zur Vorschau" />
           </form>
        </div>
        
     </div>
 </body>
</html>