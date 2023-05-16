<?php
session_start(); // Démarrage de la session

session_unset(); // Suppression des variables de session

session_destroy(); // Destruction de la session

// Redirection vers la page de connexion
header("location: index.php");
exit();
?>