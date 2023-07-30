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
            
        

    if($row["fct"]=="2")
    {

      $_SESSION["nom_utilisateur"]=$nom_utilisateur;
      header("Location:userhome.php") ;
    
    }

    elseif($row["fct"]=="1")
    {

        $_SESSION["nom_utilisateur"]=$nom_utilisateur;
        header("Location:tab.html") ;
    
    }
   

   

}
else{
   
    echo "<script>alert('Adresse Mail ou Mots de passe incorrectes !')</script>";
    
}

}
?>
