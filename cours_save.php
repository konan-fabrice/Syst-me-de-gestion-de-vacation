<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vacation";

$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération des données saisies dans le formulaire
$Idens = $_POST["Idens"];
$Idclasse = $_POST["Idclasse"];
$IdUE = $_POST["IdUE"];
$datecours = $_POST["datecours"];
$debutcours = $_POST["debutcours"];
$fincours = $_POST["fincours"];
$volcours = $_POST["volcours"];
$contenucours = $_POST["contenucours"];

// Requête SQL d'insertion
$sql = "INSERT INTO enseigner (Idens, Idclasse, IdUE, datecours, debutcours, fincours, volcours, contenucours)
VALUES ('$Idens', '$Idclasse', '$IdUE', '$datecours', '$debutcours', '$fincours', '$volcours', '$contenucours')";

if ($conn->query($sql) === TRUE) {
    echo "Enregistrement réussi";
} else {
    echo "Erreur d'enregistrement: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header('location:accueil.php');
?>
