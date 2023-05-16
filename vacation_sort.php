<?php
    include("menu.php");
    ?>
    <div>
    <h1>Liste des cours</h1>
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
}
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

echo "</select>";
         
           
            // Requête SQL pour récupérer les noms et prénoms
$sql = "SELECT Idclasse, libclasse FROM classe";
$result = $conn->query($sql);

// Création du select
echo "<select name='Idclasse'>";

echo "<option value='all_classe'>Toutes les classes</option>";
if ($result->num_rows > 0) {
    // Parcourir les résultats de la requête
    while($row = $result->fetch_assoc()) {
        // Ajouter une option pour chaque nom et prénom

        echo "<option value='" . $row['Idclasse'] . "'>" . $row['Idclasse'] . "</option>";
    }
}

echo "</select>";




           
           
        
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
?>
<input type="submit" value="Afficher"/>
    </form>
    </div>

<?php
// Récupérer les valeurs du formulaire
$enseignant = isset($_POST['Idens']) ? $_POST['Idens'] : 'all_enseignant';
$classe = isset($_POST['Idclasse']) ? $_POST['Idclasse'] : 'all_classe';
$ue = isset($_POST['IdUE']) ? $_POST['IdUE'] : 'all_UE';


// Construire la requête SQL en fonction des options sélectionnées
$sql = "SELECT e.nomens, e.prenomens, ue.libUe, c.Idclasse, en.datecours, en.debutcours, en.fincours, en.volcours, en.contenucours 
FROM Enseignant e 
INNER JOIN Enseigner en ON e.Idens = en.Idens 
INNER JOIN UE ue ON en.IdUE = ue.IdUE 
INNER JOIN Classe c ON en.Idclasse = c.Idclasse 
WHERE 1=1";

if ($enseignant != 'all_enseignant') {
    $sql .= " AND e.Idens = '$enseignant'";
}

if ($classe != 'all_classe') {
    $sql .= " AND c.Idclasse = '$classe'";
}

if ($ue != 'all_UE') {
    $sql .= " AND ue.IdUE = '$ue'";
}

$sql .= " ORDER BY en.datecours DESC";

// Exécuter la requête SQL
$result = $conn->query($sql);
?>
<table width="100%">
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
                
            // Vérifier si des résultats sont retournés
            if ($result && $result->num_rows > 0) {
                // Affichage des données à l'écran
                while ($row = $result->fetch_assoc()) {
                    echo "<tr bgcolor='whitesmoke'>";
                    echo "<td>" . $row['nomens']. " " . $row['prenomens'] . "</td>";
                    echo "<td>" . $row['libUe'] . "</td>";
                    echo "<td>" . $row['Idclasse'] . "</td>";
                    echo "<td>" . $row['datecours'] . "</td>";
                    echo "<td>" . $row['debutcours'] . "</td>";
                    echo "<td>" . $row['fincours'] . "</td>";
                    echo "<td>" . $row['volcours'] . "</td>";
                    echo "<td>" . $row['contenucours'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>Aucun résultat trouvé.</td></tr>";
            }
        ?>
</tbody>
</table>
<?php
// Fermer la connexion à la base de données
$conn->close();
// header('location:etat_vacation.php');



?>
