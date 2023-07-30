<?php
 session_start();

 if (isset($_POST['valider']) )
 {
        
      $code =$_POST['code'];
      $nom =$_POST['nom']; 
      $district =$_POST['district'];
      $date=$_POST['date'];

      $db = new PDO('mysql:host=localhost;dbname=CTI','root', '');

    
      $sql = "INSERT INTO machine (code,nom,district,date) VALUES('$code','$nom' , '$district','$date')";
      $req =$db ->prepare($sql);
      $req-> execute();
      echo "Enregistrement Effectué";

      

  
 }

?> 