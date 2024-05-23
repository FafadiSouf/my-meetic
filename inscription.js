window.addEventListener("load", () => {
//Recupere les donnees du formulaire
var lastname = document.getElementById("lastname");
var firstname = document.getElementById ("firstname");
var gender = document.getElementById("gender");
var birthdate = document.getElementById("birthdate");
var city = document.getElementById("city");
var mail = document.getElementById("mail");
var password = document.getElementById("password");
var errorEmail = document.getElementById("errorEmail");
var errorPassword = document.getElementById("errorPassword");
var formRegister = document.getElementById("register");


//Validation email
    mail.addEventListener("input", () => {
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail.value)){
        console.log('Email valide');
        errorEmail.textContent='';
    } else {
        errorEmail.textContent = 'Le mail doit contenir un @ ';
    }
    });

//Validation mot de passe
password.addEventListener("input", () => {
    if(!/^(?=.*\d).{8,}$/.test(password.value)) {
        errorPassword.textContent = 'Le mot de passe doit contenir au moins 8 caractères et un chiffre';
    } else {
        errorPassword.textContent = '';
    }
});

//Empeche l'envoie du  formulaire automatique
//formRegister.addEventListener("submit", formSubmit);
function formSubmit(e){
     e.preventDefault();

//FormData à partir du formulaire sql
    var formData = new FormData(formRegister);

    formData.append("lastname", lastname);
    formData.append("firstname", firstname);
    formData.append("gender", gender);
    formData.append("birthdate", birthdate);
    formData.append("city", city);
    formData.append("mail", mail);
    formData.append("password", password);


 //Envoie les données du formulaire
 fetch('http://localhost:9000/inscription.php', {
    method:'POST',
    body: formData
 })
.then(response => {
    if(response.ok) {
        return response.json()
    }
    throw new Error('Une erreur est survenue lors de envoie des donnees');
})
.then(data => {
    console.log(data);
})
.catch(error => {
     console.error('Erreur', error);
} );
}
});


