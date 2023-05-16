<?php
// Démarrage de la session
session_start();

// Vérification de la soumission du formulaire
if(isset($_POST['submit'])){
    
    // Récupération des informations de connexion
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connexion à la base de données
    $host = 'localhost';
    $dbname = 'vacation';
    $user = 'root';
    $password_db = '';

    try {
        $connexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password_db);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Erreur de connexion à la base de données: " . $e->getMessage();
    }
    
    // Préparation de la requête de vérification des informations de connexion
    $stmt = $connexion->prepare("SELECT emailusers, passwordusers FROM users WHERE emailusers = :email AND passwordusers = :password");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    
    // Exécution de la requête
    $stmt->execute();
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérification des informations de connexion
    if ($resultat) {
        // Les informations de connexion sont correctes, ouverture de session
        $_SESSION['email'] = $resultat['emailusers'];
        $_SESSION['password'] = $resultat['passwordusers'];
        

        // Redirection vers la page d'accueil
        header("location: accueil.php");
        exit();

    } else {
        // Les informations de connexion sont incorrectes, affichage d'un message d'erreur
        $message = "Les informations de connexion sont incorrectes. Veuillez réessayer.";
        header("location: index.php");
    }
}
?>

<?php
// Affichage du message d'erreur éventuel
if(isset($message)){
    echo $message;
}
?>
