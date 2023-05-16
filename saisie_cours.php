<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Saisie des cours</title>
</head>
<body style="background-image: url('esatic.jpg');">
    <?php
    include('menu.php');
    ?>
    
    <h1 align="center">Saisie des cours</h1>
    <form action="cours_save.php" method="post">
        <div class="saisie_cours_form">
<?php

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vacation";

$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}?>

           <label>Enseignant:
           <?php
            // Requête SQL pour récupérer les noms et prénoms
$sql = "SELECT Idens, nomens, prenomens FROM enseignant";
$result = $conn->query($sql);

// Création du select
echo "<select name='Idens'>";

if ($result->num_rows > 0) {
    // Parcourir les résultats de la requête
    while($row = $result->fetch_assoc()) {
        // Ajouter une option pour chaque nom et prénom
        echo "<option value='" . $row['Idens'] . "'>" . $row['nomens'] . " " . $row['prenomens'] . "</option>";
    }
}

echo "</select>";?>
            
           </label>
           <br><br>
           <label>Classe:
           <?php
            // Requête SQL pour récupérer les noms et prénoms
$sql = "SELECT Idclasse, libclasse FROM classe";
$result = $conn->query($sql);

// Création du select
echo "<select name='Idclasse'>";

if ($result->num_rows > 0) {
    // Parcourir les résultats de la requête
    while($row = $result->fetch_assoc()) {
        // Ajouter une option pour chaque nom et prénom
        echo "<option value='" . $row['Idclasse'] . "'>" . $row['Idclasse'] . "</option>";
    }
}

echo "</select>";



?>
           </label>
           <br><br>
           <label>Cours:
           <?php
            // Requête SQL pour récupérer les noms et prénoms
$sql = "SELECT IdUE, libUe FROM UE";
$result = $conn->query($sql);

// Création du select
echo "<select name='IdUE'>";

if ($result->num_rows > 0) {
    // Parcourir les résultats de la requête
    while($row = $result->fetch_assoc()) {
        // Ajouter une option pour chaque nom et prénom
        echo "<option value='" . $row['IdUE'] . "'>" . $row['libUe'] . "</option>";
    }
}

echo "</select>";

// Fermer la connexion
$conn->close();

?>
           </label>
           <br><br>
           
           <label>Date Cours:
            <input type="date" name="datecours" id="datecours"/>
           </label>
           <br><br>
           <label>Debut Cours:
            <input type="time" name="debutcours" id="debutcours"/>
           </label>
           <br><br>
           <label>Fin Cours:
            <input type="time" name="fincours" id="fincours"/>
           </label><br><br>
            <label>Volume cours:
            <input type="number" name="volcours" id="cours"/>
           </label>
           <br><br>
           <label>Contenu Cours:
            <textarea rows="5" cols="40" name="contenucours">

            </textarea>
           </label>
           <br><br>
           <div class="bouton_soumission">
            <input type="submit" value="Enregistrer"/>
            <input type="reset" value="Annuler"/>
           </div>
        </div>
    </form>

</body>
</html>