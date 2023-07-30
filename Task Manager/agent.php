<?php
 session_start();

 if (isset($_POST['valider']) )
 {
      $nom =$_POST['nom'];  
      $prenom =$_POST['prenom'];
      $nom_utilisateur =$_POST['nom_utilisateur'];
      $mdp=$_POST['mdp'];

      $db = new PDO('mysql:host=localhost;dbname=CTI','root', '');

      $sql = "INSERT INTO agent (nom,prenom,nom_utilisateur,mdp) VALUES('$nom','$prenom' , '$nom_utilisateur','$mdp')";
      $req =$db ->prepare($sql);
      $req-> execute();
      header("location: consulter_a.php");
 }

?> 