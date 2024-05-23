<?php
include('connect.php');

//Nouvelle session
session_start();
if(!isset($_SESSION['user_id'])) {
    header('location: connexion.php'); 
    exit;
}
//Requete pour recuperer les données de l'utilisateur 
$userId = $_SESSION['user_id'];
$sql = "SELECT firstname, gender, city FROM user WHERE id = ?";
$stmt = $database->prepare($sql);
$stmt->bindParam(1, $userId, PDO::PARAM_INT);
$stmt->execute();
//$result = $stmt->get_result();

if($user = $stmt->fetch(PDO::FETCH_ASSOC)){
    //Recupere les données de l'utilisateur 
$_SESSION['firstname'] = $user['firstname'];
$_SESSION['gender'] = $user['gender'];
$_SESSION['city'] = $user ['city'];
$_SESSION['hobbies'] = $user['hobbies'];

} else {
    echo "Utilisateur non trouvé";
}
//var_dump($_SESSION);

//Resultat de recherche tableau
$userCity=[];

//Barre de recherche 
if(isset($_POST['s'])AND !empty($_POST['s'])) {
    $search = htmlspecialchars($_POST['s']);
    $cityAll = 'SELECT * FROM user WHERE city LIKE ? ';
    $city = $database->prepare($cityAll);
    $searchParam = "%" . $search . "%";
    $city->bindParam(1, $searchParam, PDO::PARAM_STR);
    $city->execute();
    $userCity = $city->fetchAll(PDO::FETCH_ASSOC);
}