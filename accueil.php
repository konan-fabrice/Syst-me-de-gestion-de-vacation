<?php 

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vacation";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("Erreur".$e->getMessage());
}

$compter = $conn->query(" SELECT COUNT(*) AS nb1 FROM enseignant") ;        
$colonne = $compter->fetch();
$nombre = $colonne["nb1"];

$compter1 = $conn->query(" SELECT COUNT(*) AS nb1 FROM classe") ;        
$colonne1 = $compter1->fetch();
$nombre1 = $colonne1["nb1"];

$compter2 = $conn->query(" SELECT COUNT(*) AS nb1 FROM ue") ;        
$colonne2 = $compter2->fetch();
$nombre2 = $colonne2["nb1"];
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Accueil</title>
</head>
<body style="background-image: url('esatic.jpg');">
    <?php
    include("menu.php");
    ?>
    <br>
<h1>Tableau de bord</h1>
<br>
<div class="affichage_accueil">
    <div class="nbre_pro">
     <h1 style="color:white;" ><strong>Enseignants</strong> </h1   >
     <p  style="color:white; font-size:60px;"><strong> <?php echo $nombre ;?></strong></p>
    </div>
    <div class="n">
        <h1 style="color:white;"><strong> Classes</strong> </strong></h1>
        <p style="color:white; font-size:60px;"><strong><?php echo $nombre1 ;?></p>
    </div>
    <div class="nbre_matier">
        <h1 style="color:white;"><strong>UE</strong></h1>
        <p style="color:white; font-size:60px;"><strong><?php echo $nombre2 ;?></strong></p>
    </div>
</div>
</body>
</html>