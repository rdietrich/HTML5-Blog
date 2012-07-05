<?php
   mysql_connect('localhost', 'root') OR die ('Verbindung nicht Erfolgt!');
   mysql_select_db('rd_html_db') OR die ('Diese Datenbank existiert nicht!');
   
   # Article Headline & Text
  
   $sql = "SELECT `headline`, `text`, `date`, `article_img`, `ID` FROM articles";
   $res = mysql_query($sql);
?>

<!DOCTYPE html>

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
         
         <?php
         
         if (mysql_num_rows($res) > 0)
         {
         	while($row = mysql_fetch_assoc($res))
         	{
         ?>
         
                     <div class="article_box">
               <article>
                   <h2><a href="article.php?ID=<?php echo $row['ID'] ?>" ><?php echo $row['headline'] ?></a></h2>
                   <span class="date"><?php echo $row['date'] ?></span><br /><br />
                   <img class="article_img" alt="" src="img/<?php echo $row['article_img']?>" />
                   <?php
                      
                      if(strlen($row['text']) >=250);
                      {
                         $row['text']=wordwrap($row['text'],200); //Zeilenumbruch einfügen spätestens nach 20 Zeichen 
						 $row['text']=substr($row['text'],0,200).'...'; //bei Zeilenumbruch Text abschneinden 
                         echo $row['text'];
                      }
                   
                   ?>
                   
                  
               </article>
               <a class="read_more_link" href="article.php?ID=<?php echo $row['ID'] ?>" >…read more!</a>
            </div>
         
         <?php
         	}         
         
         
         
         
         }
         else
         {
            // es gibt keine artikel
            echo "Es gibt keine Artikel!";
         }
         
		?>
            
            
            
         </div>
         <footer id="footer">
            <span id="footer_txt">CC-BY-NC Robin Dietrich</span>
            <div id="badges">
               <img src="img/html_icons/connectivity.png" alt="" />
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