window.addEventListener("load", () => {
    //Recupere les donnees du formulaire
var mail = document.getElementById("mail");
var password = document.getElementById("password");
var errorEmail = document.getElementById("errorEmail");
var errorPassword = document.getElementById("errorPassword");
var formRegister = document.getElementById("register");


//Validation email
mail.addEventListener("input", function(){
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail.value)){
    console.log('Email valide');
    errorEmail.textContent='';
} else {
    errorEmail.textContent = 'Le mail doit contenir un @ ';
}
});

//Validation mot de passe
password.addEventListener("input", function() {
if(!/^(?=.*\d).{8,}$/.test(password.value)) {
    errorPassword.textContent = 'Le mot de passe doit contenir au moins 8 caractères et un chiffre';
} else {
    errorPassword.textContent = '';
}
});

//Soumet le formulaire
formRegister.addEventListener("submit", function(event){
    event.preventDefault();


// Recupere les données du formulaire 
var formData = new FormData(formRegister);
formData.append("mail", mail);
formData.append("password", password);

//Envoi les données du formulaire
fetch('http://localhost:9000/connexion.php', {
method: 'POST',
body: formData
})
.then(response => {
if (!response.ok) {
    throw new Error('Problème avec le serveur');
}
return response.text();
})
//Traite si les donnes sont correct au serveur
.then(text =>{
console.log(text);

//Redirige l'utilisateur sur sont profil
window.location.href = "compte.php";
})
.catch(error => {
cpnsole.log.error('Il y a un probleme avec l operation', error ); 
}); 

});
});