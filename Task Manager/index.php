<?php 

//connexion a la bd
$host="localhost";
$user="root";
$password="";
$db="cti";

session_start();

$data=mysqli_connect($host,$user,$password,$db);
if($data===false)
{
    die('connection error');
}
//fin de connection

if($_SERVER["REQUEST_METHOD"]==="POST")
{
    $nom_utilisateur=$_POST["nom_utilisateur"];//eli hattou f formulaire thtou ma bin []
    $mdp=$_POST["mdp"];

    $sql="SELECT * FROM agent where nom_utilisateur= '".$nom_utilisateur ."' AND mdp='".$mdp ."'";

    $result=mysqli_query($data,$sql);
    $row=mysqli_fetch_array($result);
    
    $req = mysqli_query($data , "SELECT * FROM agent WHERE nom_utilisateur = '$nom_utilisateur' AND mdp ='$mdp' ") ;
    $num_ligne = mysqli_num_rows($req) ;//Compter le nombre de ligne ayant rapport a la requette SQL
        if($num_ligne > 0){
       
            $_SESSION['nom_utilisateur'] = $nom_utilisateur ;
            
        

    
    

      $_SESSION["nom_utilisateur"]=$nom_utilisateur;
      header("Location:userhome.php") ;
    
    
   

   

}
else{
   
    echo "<script>alert('Adresse Mail ou Mots de passe incorrectes !')</script>";
    
}

}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Se Connecter</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="assets/css/templatemo.css">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>

	<body>
		<div class="wrapper"  >
			<div class="inner">
				
				<div class="image-holder">
					<img src="assets/img/f.png" alt="">
				</div>
				<form action="" method="post">
					<div id="ajouter"><span class=" h3" id="steg">Se Connecter</span> </div><br><br>
				
					<div class="form-wrapper">
						<input type="text" placeholder="Nom d'utilisateur" name="nom_utilisateur" class="form-control">
						<i class="zmdi zmdi-account"></i>
					</div>
	
					<div class="form-wrapper">
						<input type="password" placeholder="Mot De Passe" name="mdp" class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>
				
					<button name="valider">Connexion
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>
			</div>
		</div>
	</body>
</html>