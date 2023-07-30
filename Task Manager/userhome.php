<?php 
session_start();
if(!isset($_SESSION["nom_utilisateur"])){
    header("location:index.html");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>espace agent</title>
</head>
<body>
    <h1>user page</h1>
    <?php
    echo $_SESSION["nom_utilisateur"]
    ?>

    <a href="logout.php">Logout</a>
</body>
</html>