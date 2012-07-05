<?php
   mysql_connect('localhost', 'root') OR die ('Verbindung nicht Erfolgt!');
   mysql_select_db('rd_html_db') OR die ('Diese Datenbank existiert nicht!');
   
      # Article Headline & Text
  
   $sql = "SELECT `headline`, `text`, `date`, `ID` FROM articles";
   $res = mysql_query($sql);
   $id  = $row['ID'];
   $del_true = $_GET['delete'];
   
   
   //Function for deleting posts 
   
   if (isset($del_true))
   {
      mysql_query("DELETE FROM `rd_html_db`.`articles` WHERE `articles`.`ID` = '$id'");
   }
   
   
?>

<html>
 <head>
  <title>HTML 5 Backend Stuff</title>
  <link rel="stylesheet" type="text/css" href="backend.css" />
  <meta charset="UTF-8">
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
        <a href="new.php">Neuer Artikel</a>
        <div class="articles_box">
          <table id="article_table">
             <tr>
                <th>Datum</th>
                <th>Titel</th>
                <th>Text</th>
                <th>Aktionen</th>
             </tr>
             <?php
                while($row = mysql_fetch_assoc($res))
                {
             ?>
                <tr>
                   <td><?php echo $row['date'] ?></td>
                   <td><?php echo $row['headline'] ?></td>
                   <td id="table_text">
                     <?php if(strlen($row['text']) >=250);
                      {
                         $row['text']=wordwrap($row['text'],200); //Zeilenumbruch einfügen spätestens nach 20 Zeichen 
						 $row['text']=substr($row['text'],0,200).'...'; //bei Zeilenumbruch Text abschneinden 
                         echo $row['text'];
                      }
                      ?>
                   </td>
                   <td>
                      <form action="articles.php" method="get">
                         <input type="button" id="delete" name="edit" value="Bearbeiten" />
                         <input type="button" id="delete" name="delete" value="Löschen" />
                      </form>
                </td>
             </tr>
             <?
                }
             print_r($row);
             ?>
             
          </table>
       </div>
    </div>
 </body>
</html>
           