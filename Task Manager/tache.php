<?php
 session_start();

 if (isset($_POST['valider']) )
 {
      $nom_machine =$_POST['nom_machine'];  
      $nom_agent =$_POST['nom_agent'];
      

      $db = new PDO('mysql:host=localhost;dbname=CTI','root', '');

      $sql = "INSERT INTO tache (nom_machine,nom_agent) VALUES( '$nom_machine','$nom_agent')";
      $req =$db ->prepare($sql);
      $req-> execute();
      header("location: consulter_t.php");
 }

?> 