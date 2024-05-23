<?php

include('connect.php');

//Recupere les infos de la table user et assigne a la valeur
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lastname = $_POST['lastname'] ?? '';
    $firstname = $_POST['firstname'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $birthdate = $_POST['birthdate'] ?? '';
    $email = $_POST['email'] ?? '';
    $city = $_POST['city'] ?? '';
    $password = $_POST['password'] ?? '';
}

// Continuer seulement si les champs obligatoires sont présents
if (
    !empty($lastname) && !empty($firstname) && !empty($gender) && !empty($birthdate)
    && !empty($email) && !empty($city) && !empty($password)
) {
//Converti la date en format YYYY-MM-DD
    $formBirthdate = DateTime::createFromFormat('Y-m-d', $birthdate);

//L'age min 18 ans
    $today = new DateTime();
    $age = $today->diff($formBirthdate)->y;

    if ($age < 18) {
        echo "Vous devez avoir au moins 18 ans pour vous inscrire";
        exit();
    }

// Hachage du mot de passe
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


//Requete SQL pour inserer les donnees
    $sqlUser = "INSERT INTO user (lastname, firstname, gender, birthdate, email, city, password)
    VALUES (:lastname, :firstname, :gender, :birthdate, :email, :city, :password)";

// On prepare la requete
    if ($userInsert = $database->prepare($sqlUser)) {
     // Liaison des paramètres
        $userInsert->bindParam(':lastname', $lastname);
        $userInsert->bindParam(':firstname', $firstname);
        $userInsert->bindParam(':gender', $gender);
        $userInsert->bindParam(':birthdate', $birthdate);
        $userInsert->bindParam(':email', $email);
        $userInsert->bindParam(':city', $city);
        $userInsert->bindParam(':password', $hashed_password);

    //Execution de la requete
        if ($userInsert->execute()) {
            echo "Votre inscription a été enregistré avec succées.";

// Recupere les valeurs de checkbox
$user_id = $database->lastInsertId();

//On soummet les hobbies 
if(isset($_POST['hobbies']) && !empty($_POST['hobbies'])) {
    $hobbies = $_POST['hobbies'];

// On prepare la requete pour inserer les hobbies
$sqlHobbies = "INSERT INTO user_hobbies (user_id, hobbies_id) VALUES (:user_id, :hobbies_id)";
$hobbiesInsert =$database->prepare($sqlHobbies);

//Pour chaque hobbies selectionne il insere pour l'utilisateur 
foreach($hobbies as $hobby_id) {
    $hobbiesInsert->execute([':user_id' => $user_id, ':hobbies_id' => $hobby_id]);
}
}
  } else {
            echo "Erreur";
        }
    }
}
