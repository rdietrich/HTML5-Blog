<?php
   $missing_value = "";
   $form_complete = 1;
   if (isset($vorname) OR ($nachname) OR ($email) OR ($text) AND ($submit));
   {
      if(empty($vorname));
      $missing_value ="Bitte trage deinen Namen noch ein!";
      if(empty($nachname));
      $missing_value ="Bitte trage deinen Nachnamen noch ein!";
      if(empty($email));
      $missing_value ="Bitte trage deine Email-Adresse noch ein!";
      if(empty($text));
      $missing_value ="Du hast dein Kommentar vergessen";
   }
   else
   {
   $form_complete = 1;
   }
   
   if ($form_complete = 1 AND isset($submit));
   {
      mysql_query("INSERT INTO `rd_html_db`.`comments` (`Datum`, `Vorname`, `Nachname`, `Email`, `Kommentar`) VALUES (NOW(), '$name', '$nachname', '$email', '$text')");
   }
   elseif ($formcomplete = 0 AND isset($submit));
   {
      echo $missing_value;
   }



?>