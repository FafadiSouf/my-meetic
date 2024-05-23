<?php
include('compte1.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compte</title>
    <link rel="stylesheet" href="compte.css">
</head>

<body>
    <!-- Page d'accueil après connexion -->
    <header>
        <h1>Bienvenue sur My meetic ! </h1>
    </header>

    <!-- Section profil -->
    <section class="profil">
        <h2> Votre profil</h2>
        <p><strong>Prenom:</strong><?= htmlspecialchars($_SESSION['firstname']);?></p>
        <p><strong>Genre:</strong><?= htmlspecialchars($_SESSION['gender']);?></p>
        <p><strong>Ville:</strong><?= htmlspecialchars($_SESSION['city']);?></p>
        <p><strong>Loisirs:</strong><?= htmlspecialchars($_SESSION['hobbies']);?></p>
    </section>

    <!-- Section recherche -->
    <section class="recherche">
        <h2>Recherche</h2>

        <!-- Formulaire -->
        <form method="POST" action="compte.php" >
            <!-- Localisation -->
            <label for="ville"> Localisation (Ville):</label>
            <input type="text" name="s" placeholder="Entrez une ville" autocomplete="off">

            <!--  Resultat des recherche-->
            <?php if(!empty($userCity)):
                foreach($userCity as $user):?>
                <p><?= htmlspecialchars($user['firstname']) . '<br>'. htmlspecialchars($user['city']) ; ?></p>
                <?php endforeach;?>
                <?php endif; ?>

            <!-- Tranches d'âge en checkboxes -->
            <fieldset class="tranche-age">
                <legend>Tranche d'âge</legend>
                <label><input type="checkbox" name="tranche_age" value="18-25"> 18-25</label>
                <label><input type="checkbox" name="tranche_age" value="25-35"> 25-35</label>
                <label><input type="checkbox" name="tranche_age" value="35-45"> 35-45</label>
                <label><input type="checkbox" name="tranche_age" value="45plus"> 45+</label>
            </fieldset>


            <label>Age:</label>
            <input type="number" name="age" min="18" placeholder="Tous age">

            <label>Sexe:</label>
            <select name="sexe">
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
                <option value="autre">Autre</option>
            </select>

            <label for="loisir">Loisir:</label>
            <input type="text" id="hobbies" name="hobbies" placeholder="Tout loisir">
                
            <input type="submit" value="Rechercher">
        </form>
    </section>

    <footer>
        <p>&copy; 2024 My meetic. Tout droits réservés.</p>
    </footer>
</body>
</html>