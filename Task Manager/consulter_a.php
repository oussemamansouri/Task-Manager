<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Load Require CSS -->
  
    <!-- Load Tempalte CSS -->
    <link rel="stylesheet" href="assets/css/aff.css">
    <title>Liste des agents</title>


    
</head>
<body>
       
<a href="tab.html" class="close">
    <div class="container">
        
    <div class="containeer">
        <div class="buttons">
            <a href="agent.html" class="btn btn-1">+ Ajouter</a>
        </div>
    </div>

    
        
        <table>
            <tr id="items">
                <th>Id</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Nom d'utilisateur</th>
                <th>Mot de Passe</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php 
                //inclure la page de connexion
                include_once "bd.php";
                //requête pour afficher la liste des employés
                $req = mysqli_query($con , "SELECT * FROM agent");
                if(mysqli_num_rows($req) == 0){
                    //s'il n'existe pas d'employé dans la base de donné , alors on affiche ce message :
                    echo "Il n'y a pas encore d'employé ajouter !" ;
                    
                }else {
                    //si non , affichons la liste de tous les employés
                    while($row=mysqli_fetch_assoc($req)){
                        ?>
                        <tr>
                            <td><?=$row['id']?></td>
                            <td><?=$row['nom']?></td>
                            <td><?=$row['prenom']?></td>
                            <td><?=$row['nom_utilisateur']?></td>
                            <td><?=$row['mdp']?></td>
                            <!--Nous alons mettre l'id de chaque employé dans ce lien -->
                            <td><a href="modifier_a.php?id=<?=$row['id']?>"><img class="img_table" src="assets/img/pen.png"></a></td>
                            <td><a href="supprimer_a.php?id=<?=$row['id']?>"><img class="img_table" src="assets/img/trash.png"></a></td>
                        </tr>
                        <?php
                    }
                    
                }
            ?>
      
         
        </table>
   
   
   
   
    </div>
</body>
</html>