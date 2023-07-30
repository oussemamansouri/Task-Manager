<!DOCTYPE html>
<html lang="en">

<head>
    <title>Modifier Machine</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Load Require CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font CSS -->
    <link href="assets/css/boxicon.min.css" rel="stylesheet">
    <!-- Load Tempalte CSS -->
    <link rel="stylesheet" href="assets/css/templatemo.css">
</head>

<body>


    <?php

//connexion à la base de donnée
 include_once "bd.php";
//on récupère le id dans le lien
 $id = $_GET['id'];
 //requête pour afficher les infos d'un employé
 $req = mysqli_query($con , "SELECT * FROM machine WHERE id = $id");
 $row = mysqli_fetch_assoc($req);


//vérifier que le bouton ajouter a bien été cliqué
if(isset($_POST['valider'])){
  //extraction des informations envoyé dans des variables par la methode POST
  extract($_POST);
  //verifier que tous les champs ont été remplis
  if(isset($nom) && isset($code) && isset($nom) && isset($district) && isset($date)){
      //requête de modification
      $req = mysqli_query($con, "UPDATE machine SET nom = '$nom' , code = '$code' , district = 'district' , date ='$date' WHERE id = $id");
       if($req){//si la requête a été effectuée avec succès , on fait une redirection
         header("location: consulter_m.php"); //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
       }else {//si non
           $message = "Employé non modifié";
       }

  }else {
      //si non
      $message = "Veuillez remplir tous les champs !";
  }
}

?>

  <!-- Header -->
  <nav id="main_nav" class="navbar navbar-expand-lg navbar-light bg-white shadow">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand h1" href="tab.html">
                <i class='bx bx-buildings bx-sm text-dark'></i>
                <span class=" h4" id="steg">STEG</span> <span class=" h4" id="cti">CTI</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-toggler-success" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="navbar-toggler-success">
                <div class="flex-fill mx-xl-5 mb-2">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-xl-5 text-center text-dark">
                        <li class="nav-item">
                            <a class="dropbtn nav-link  rounded-pill px-3" href="tab.html">Tableau de Bord</a>
                        </li>
                        <li class="nav-item">
                          <div class=" dropbtn" href="agent.html"><div class="dropdown">
                            Agents
                            <div class="dropdown-content">
                              <a href="agent.html">Ajouter </a>
                          <a href="consulter_a.php">Consulter </a>
                              
                            </div>
                          </div></div>
                      </li>
                      <li class="nav-item">
                        <div class=" dropbtn" href="machine.html"><div class="dropdown">
                          Machines
                          <div class="dropdown-content">
                            <a href="machine.html">Ajouter</a>
                            <a href="consulter_m.php">Consulter</a>
                          </div>
                        </div></div>
                    </li>
                    <li class="nav-item">
                      <div class=" dropbtn" href="tache.html"><div class="dropdown">
                        Taches
                        <div class="dropdown-content">
                          <a href="tache.html">Ajouter</a>
                          <a href="consulter_t.php">Consulter</a>
                          
                        </div>
                      </div></div>
                  </li>
                     
                     
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <a class="nav-link" href="#"><i class='bx bx-bell bx-sm bx-tada-hover text-primary'></i></a>
                    
                  
                    <div class="action">
                        <div class="profile" onclick="menuToggle();">
                            <a class="nav-link" href="#"><i class='bx bx-user-circle bx-sm text-primary'></i>
                            </a>
                        </div>
                        <div class="menu">
                          <h3>Bechir Ben Nasra <br><span>Chef de CTI</span></h3>
                          <ul>
                            <li>
                              <img src="./assets/img/log-out.png" /><a href="#">Déconnexion</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <script>
                        function menuToggle() {
                          const toggleMenu = document.querySelector(".menu");
                          toggleMenu.classList.toggle("active");
                        }
                      </script>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Header -->



    <div class="wrapper"  >
      <div class="inner">
          
          <div class="image-holder">
              <img src="assets/img/machine.png" id="machine" alt="">
          </div>
          <form action="" method="post">
              <div id="ajouter"><span class=" h3" id="steg">Modifier une</span> <span class=" h3" id="cti">Machine</span></div><br><br>
              <div class="form-wrapper">
                  <input type="text" placeholder="Code de la machine" name="code" class="form-control" value=" <?=$row['code']?>"required>   
              </div>

              <div class="form-wrapper">
                  <input type="text" placeholder="Nom de la machine" name="nom" class="form-control"value=" <?=$row['nom']?>" required>    
              </div>

              <div class="form-wrapper">
                  <input type="text" name="district" placeholder="Nom du district" class="form-control" value=" <?=$row['district']?>"required>
              </div>

              <div class="form-wrapper">
                <label for="date" class="form-wrapper">Date d'arrivée:<br></label>
                <input type="date" id="date" name="date" class="form-control"value=" <?=$row['date']?>" required>
              </div>
          
              <button name="valider">Enregistrer</button>
          </form>
      </div>
  </div>
    </body>
    

</html>