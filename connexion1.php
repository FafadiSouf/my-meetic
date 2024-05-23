<?php
include('connect.php');

//Nouvelle session
session_start(); 

// Recupere les donnees pour se connecter 
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email']; 
    $password = $_POST['password'];

//Prepare la requete SQL
$sql=$database->prepare("SELECT id, password FROM user WHERE email = ?");
$sql->bindValue(1, $email); 
$sql->execute();
$user = $sql->fetch(); // Recupere l'utilisateur

//Recupere l'email et verifie le mot de passe
if($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    header("location: compte.php");
    exit;
}else{
    echo "Le mot de passe et/ou le email est incorrect";
 }
}