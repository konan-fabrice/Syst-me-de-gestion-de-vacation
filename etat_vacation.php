<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des cours</title>
  </head>
  <body style="background-image: url('esatic.jpg');">
  <?php
    include("menu.php");
    ?>
    <div>
    <h1>Liste des cours</h1>
    <center>
    <form action="vacation_sort" method="post">
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

           
           <?php
            // Requête SQL pour récupérer les noms et prénoms
$sql = "SELECT Idens, nomens, prenomens FROM enseignant";
$result = $conn->query($sql);

// Création du select
echo "<select name='Idens'>";
echo "<option value='all_enseignant'>Tous les enseignants</option>";
if ($result->num_rows > 0) {
    // Parcourir les résultats de la requête
    while($row = $result->fetch_assoc()) {
        // Ajouter une option pour chaque nom et prénom
        echo "<option value='" . $row['Idens'] . "'>" . $row['nomens'] . " " . $row['prenomens'] . "</option>";
    }
}

echo "</select>";?>
         
           <?php
            // Requête SQL pour récupérer les noms et prénoms
$sql = "SELECT Idclasse, libclasse FROM classe";
$result = $conn->query($sql);

// Création du select
echo "<select name='Idclasse'>";

echo "<option value='all_classes'>Toutes les classes</option>";
if ($result->num_rows > 0) {
    // Parcourir les résultats de la requête
    while($row = $result->fetch_assoc()) {
        // Ajouter une option pour chaque nom et prénom

        echo "<option value='" . $row['Idclasse'] . "'>" . $row['Idclasse'] . "</option>";
    }
}

echo "</select>";

?>
           
           
           <?php
            // Requête SQL pour récupérer les noms et prénoms
$sql = "SELECT IdUE, libUe FROM UE";
$result = $conn->query($sql);

// Création du select
echo "<select name='IdUE'>";
echo "<option value='all_UE'>Toutes les UE</option>";

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


<input type="submit" value="Afficher"/>
    </form>
    </div>
    </center>
    <center>
    <table width="70%">
      <thead>
        <tr bgcolor="green">
          <th>Enseignant</th>
          <th>UE</th>
          <th>Classe</th>
          <th>Date de cours</th>
          <th>Début</th>
          <th>Fin</th>
          <th>Volume horaire</th>
          <th>Contenu</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require_once 'afficher_cours.php';
        ?>
      </tbody>
    </table>
    </center>
  </body>
</html>
