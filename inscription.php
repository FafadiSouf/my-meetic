<?php

//Lier le script php d'inscription
include('inscription1.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inscription.css">
    <title>Inscription</title>
</head>

<body>
    <div class="main-container">
    <div class="container">
        <h1>My Meetic</h1>
    <!-- Formulaire d'inscription -->
    <form action="inscription.php" method="post" name="register" id="register">
    <h2>Inscription</h2>

        Nom: <input type="text" name="lastname" id="lastname" placeholder="Entrez votre nom" autocomplete="off" required><br>
        Prénom: <input type="text" name="firstname" id="firstname" placeholder="Entrez votre prenom"  autocomplete="off" required><br>
        Date de naissance: <input type="date" name="birthdate" id="birthdate" required><br>
        
        <div class="radio">
             Genre:   
            <label><input type="radio" name="gender" id="gender" value="homme" required> Homme</label>
            <label><input type="radio" name="gender" id="gender" value="femme"> Femme </label>
            <label><input type="radio" name="gender" id="gender" value="autre"> Autre </label>
        </div>

        Ville: <input type="text" name="city" id="city" placeholder="Entrez votre ville" autocomplete="off" required><br>
        E-mail: <input type="email" name="email" id="mail" placeholder="Entrez votre email" autocomplete="off" required><br>
        <!-- Erreur mail Javascript -->
        <div id="errorEmail"></div> <br> <br>
        Mot de passe: <input type="password" name="password" id="password" placeholder="Entrez votre password"  autocomplete="off" required><br>
        <!-- Erreur password Javascript -->
        <div id="errorPassword"></div> <br> <br>

        <div class="loisirs">
            Loisirs: <br>
            <label><input type="checkbox" name="hobbies[]" id="fitness" value="25"> Fitness</label><br>
            <label><input type="checkbox" name="hobbies[]" id="voyages" value="26"> Voyages</label><br>
            <label><input type="checkbox" name="hobbies[]" id="cuisine" value="27"> Cuisine</label><br>
            <label><input type="checkbox" name="hobbies[]" id="musique" value="28"> Musique</label><br>
            <label><input type="checkbox" name="hobbies[]" id="cinema" value="29"> Cinéma</label><br>
            <label><input type="checkbox" name="hobbies[]" id="sports" value="30"> Sports</label><br>
            <label><input type="checkbox" name="hobbies[]" id="lecture" value="31"> Lecture</label><br>
            <label><input type="checkbox" name="hobbies[]" id="arts" value="32"> Arts</label><br>
            <label><input type="checkbox" name="hobbies[]" id="danse" value="33"> Danse</label><br>
            <label><input type="checkbox" name="hobbies[]" id="jeux" value="34"> Jeux</label><br>
        </div>
        <input type="submit" value="S'inscrire">
    </form>


    <!-- Lien de conexion si on a un compte -->
    <div class="connexion">
        <p> Vous avez déjà un compte ?</p>
        <a href="./connexion.php">Connectez-vous</a>
    </div>

    </div>
    </div>
    
    <footer>
        <p>&copy; 2024 My Meetic. by Rafadhia HOUMADI. Tout droits réservés. </p>
    </footer>

    <script src="inscription.js"></script>

</body>
</html>