<?php
   mysql_connect('localhost', 'root') OR die ('Verbindung nicht Erfolgt!');
   mysql_select_db('rd_html_db') OR die ('Diese Datenbank existiert nicht!');
   
   # Article Headline & Text
   $id = $_GET['ID'];
   $sql = "SELECT `headline`, `text`, `date`, `article_img` FROM articles WHERE `id`='$id'";
   $res = mysql_query($sql);
   $row = mysql_fetch_assoc($res);
   $name = $_POST["name"];
   $nachname = $_POST["nachname"];
   $email = $_POST["email"];
   $text = $_POST["text"];
   $submit = $_POST['submit'];
  
   //Holen Der Kommentare aus der Datenbank
   
   $sql_comments = "SELECT `Vorname`, `Nachname`, `Datum`, `Kommentar` FROM comments WHERE `article_id`='$id'";
   $comm_query	 = mysql_query($sql_comments);
   $comm_num_rows = mysql_num_rows($comm_query);
?>
<html>
   <head>
      <title>Awesome HTML 5 Stuff</title>
      <meta charset="UTF-8" />
      <link rel="stylesheet" type="text/css" href="style.css" />
      <link rel="stylesheet" type="text/css" href="forms/style.css" />
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
               
               
  			<?php 
  			
  			   if (isset($_GET["ID"]))
  			   {
  			    
  		    ?>	
				<h4><?php echo $row['headline'] ?></h4> <!-- article-headline -->
  			 <img class="article_img" src="img/<?php echo $row['article_img'] ?>" alt="" />
  			 <?php 
  			 echo $row['text']  ; //Article text  
  			   
  			   } 
  			  
  			  
  			?>
  			<div id="comments">
  			   
  			
  			   <h4>Kommentare:</h4>
  			  <?php 
  			     if ($comm_num_rows >= 0)
  			     {
  			        while($comm_row = mysql_fetch_assoc($comm_query))
  			        {
  			         
  			  ?>
  			    
  			  
  			   <div class="comment_box">
  			      <div class="comment_name"><h3><?php echo $comm_row['Vorname']; ?></h3></div>
  			      <span class="date"><?php echo $comm_row['Datum'] ?></span><br /><br />
  			      <div class="comment_text"><?php echo $comm_row['Kommentar'] ?></div>
  			   </div>
  			      
  			   <?php
  			       }
  			     }
  			  
   			   ?>
                <form name="comments" method="post" action="article.php?ID=<?php echo $_GET['ID'] ?>">
                   <label for="name">Vorname:</label> <input type="text" id="name" name="name" placeholder="Vorname" /> <br>
            	   <label for="last_name">Nachname:</label> <input type="text" id="last_name" name="nachname" placeholder="Nachname" /> <br>
           		   <label for="Email">Email Adresse:</label> <input type="text" id="email" name="email" placeholder="Email Adresse" /> <br>
           		   <label for="Kommentar">Dein Kommentar</label> 
           		   <textarea type="text" id="message" name="text" placeholder="Dein Kommentar" /></textarea> <br />
				   <input type="submit" name="submit" id="submit" value="Absenden" />
                
                </form>
                <?php
                   if(isset($_POST["submit"]))
                   {
                      
      mysql_query("INSERT INTO `rd_html_db`.`comments` (`Datum`, `Vorname`, `Nachname`, `Email`, `Kommentar`, `article_id`) VALUES (NOW(), '$name', '$nachname', '$email', '$text', '$id')");
                   }
                   
                 ?>

             </div>
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