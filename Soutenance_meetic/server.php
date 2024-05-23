<!-- Faire la reception de la requette js et
afficher dans le terminal / un fichier / la bdd 
le nom et prenom pris du front -->

<?php
//On recupre les valeur de nom et prenom
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];

//Si le formulaire et valide on renvoie les données
if(isset($_POST['submit'])){
 echo $firstname. ' ' . $lastname; 
}