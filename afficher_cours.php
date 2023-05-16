<?php
// Informations de connexion à la base de données
$host = "localhost";
$dbname = "vacation";
$user = "root";
$password = "";

// Connexion à la base de données
$connexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$connexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

// Requête SQL pour récupérer les cours
$sql = "SELECT e.nomens, e.prenomens, ue.libUe, c.Idclasse, en.datecours, en.debutcours, en.fincours, en.volcours, en.contenucours 
FROM Enseignant e 
INNER JOIN Enseigner en ON e.Idens = en.Idens 
INNER JOIN UE ue ON en.IdUE = ue.IdUE 
INNER JOIN Classe c ON en.Idclasse = c.Idclasse 
ORDER BY en.datecours DESC";

// Exécuter la requête
$resultat = $connexion->query($sql);

// Afficher les résultats dans un tableau HTML
while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
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

// Fermer la connexion à la base de données
$connexion = null;

?>