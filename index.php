<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Connexion</title>
</head>

<body style="background-image: url('connexion1.jpg');
background-size:100%">

    <center>
        <div class="connexion_aff">
            <img src="esatic.png"/>
        <h1 class="connexion_title">Connexion</h1>
        <h4>RENSEIGNEZ VOS COORDONNES</h4>
        <br>
        <form action="connexion_form.php" method="post">
            <div>
                <label for="user">
                    Email <input type="mail" name="email" placeholder="abc@example.com" style="width: 100%;
  padding: 10px;
  margin-top: 5px;
  margin-bottom: 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
  font-size: 16px;">
                </label>
            </div>
            <div>
                <label for="pass">
                    Mot de passe <input type="password" name="password" placeholder="password">
                </label>
            </div>
            <div>
                <input type="submit" name="submit" value="connexion">
                <input type="reset" value="Annuler">
            </div>
        </form>
    </div>
    </center>
</body>

</html>
<style>
    /* Centrer le formulaire */
form {
  display: flex;
  flex-direction: column;
  align-items: center;
}

/* Style pour le titre "Connexion" */
.connexion_title {
  text-align: center;
  font-size: 32px;
  margin-top: 0;
}

/* Style pour le sous-titre "RENSEIGNEZ VOS COORDONNES" */
h4 {
  text-align: center;
  font-size: 18px;
  margin-top: 10px;
  margin-bottom: 30px;
}

/* Style pour les labels */
label {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-bottom: 20px;
}

/* Style pour les champs de texte */
input[type="email"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  margin-top: 5px;
  margin-bottom: 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
  font-size: 16px;
}

/* Style pour le bouton "Se connecter" */
input[type="submit"] {
  background-color: #337ab7;
  color: #fff;
  border-radius: 5px;
  border: none;
  padding: 10px 20px;
  margin-right: 10px;
  font-size: 16px;
}

/* Style pour le bouton "Annuler" */
input[type="reset"] {
  background-color: #f0ad4e;
  color: #fff;
  border-radius: 5px;
  border: none;
  padding: 10px 20px;
  font-size: 16px;
}

/* Style pour l'image */
img {
  display: block;
  margin: 0 auto;
  max-width: 100%;
  height: auto;
  margin-bottom: 30px;
}

</style>