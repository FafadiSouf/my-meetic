<?php
//Lier le script php de connexion
include('connexion1.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="connexion.css">
    <title>Connexion</title>
</head>

<body>

    <div class="container">
        <div class="connexion">
            
        <h1>My meetic </h1>
        <!-- Formulaire de connexion -->
        <form action="connexion.php" method="post" name="register" id="register">
            <h2>Connexion</h2>
            E-mail: <input type="email" name="email" id="mail" placeholder="Entrez votre email" autocomplete="off" required><br>
                   <!-- Erreur mail Javascript -->
            <div id="errorEmail"></div> <br> <br>
           
            Mot de passe: <input type="password" name="password" id="password" placeholder="Entrez votre password"  required><br>
                  <!-- Erreur password Javascript -->
            <div id="errorPassword"></div> <br> <br>

            <input type="submit" value="Connexion">
        </form>
        </div>

            <!-- Lien d'inscription si on pas un compte -->
    <div class="inscription">
        <p> Vous n'avez pas un compte ?</p>
        <a href="./inscription.php">Inscrivez-vous</a> 
    </div>
    </div>



    <footer>
        <p>&copy; 2024 My meetic. Tout droits réservés.</p>
    </footer>
</body>
</html>