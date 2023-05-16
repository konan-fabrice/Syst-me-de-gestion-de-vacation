<?php
/* script de connexion a la base de donnee en php pour stocker nos donnees  */
try{
    $db= new PDO('mysql:host=127.0.0.1; dbname=vacation', 'root', '');
}
catch(Exception $e){
    die('Erreur: '.$e->getMessage());
}
?>
