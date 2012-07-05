<!DOCTYPE html>
<?php
   mysql_connect('localhost', 'root') or die ('Verbindung nicht Erfolgt!');
   mysql_select_db('rd_html_db') or die ('Diese Datenbank existiert nicht!');
   
   # Imprint Text
    
   $get_imprint_text = "SELECT `text` FROM imprint WHERE `id`='1'";
   $imprint_text = mysql_result(mysql_query($get_imprint_text),0);
  
?>
<html>
   <head>
      <title>Awesome HTML 5 Stuff</title>
      <meta charset="UTF-8" />
      <link rel="stylesheet" type="text/css" href="style.css" />
   </head>
   <body>
      <div id="header_bg"></div>
      <div id="maindiv">
         <div id="mainnav">
            <nav>
               <a href="index.php">Home</a>
               <a href="about.php">About</a>
               <a href="imprint.php">Imprint</a>
               <a href="legal.php">Legal Notes</a>
            </nav>
         </div>
         <div id="content">
            <div id="content_box">
               <h1>Imprint</h1>
			   <?php echo $imprint_text ?>
            </div>
         <footer id="footer">
            <span id="footer_txt">CC-BY-NC Robin Dietrich</span>
            <div id="badges">
               <img src="img/htmL_icons/connectivity.png" alt="" />
               <img src="img/html_icons/device_access.png" alt="" />
               <img src="img/html_icons/effects.png" alt="" />
               <img src="img/html_icons/effects.png" alt="" />
               <img src="img/html_icons/multi_media.png" alt="" />
               <img src="img/html_icons/offline_storage.png" alt="" />
               <img src="img/html_icons/semantics.png" alt="" />
               <img src="img/html_icons/styling.png" alt="" />
            </div>
         </footer>
      </div>
   </body>
</html>