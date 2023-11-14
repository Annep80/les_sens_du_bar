// // Fonction de validation du formulaire de contact
// function validateForm(event) {
//     event.preventDefault();

//     // Récupérer les valeurs des champs
//     let lastname = document.getElementById("lastname").value;
//     let firstname = document.getElementById("firstname").value;
//     let phoneNumber = document.getElementById("phoneNumber").value;
//     let email = document.getElementById("mail").value;
//     let rgpdCheckbox = document.getElementById("textRgpd");

//     // Vérification des champs obligatoires
//     if (lastname === "" || firstname === "" || phoneNumber === "" || email === "") {
//         alert("Veuillez remplir tous les champs obligatoires.");
//         return false;
//     }

//     // Vérification de l'adresse e-mail
//     let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
//     if (!email.match(emailPattern)) {
//         alert("Veuillez entrer une adresse e-mail valide.");
//         return false;
//     }

//     // Vérification de la case RGPD
//     if (!rgpdCheckbox.checked) {
//         alert("Vous devez accepter la politique de confidentialité.");
//         return false;
//     }

//     // Le formulaire est valide, il peut être soumis
//     event.target.submit();
// }

// document.addEventListener("DOMContentLoaded", function () {
//     // Attacher la fonction de validation au formulaire
//     var form = document.getElementById("contactForm");
//     if (form) {
//         form.addEventListener("submit", validateForm);
//     }
// });

// // Fonction de validation du formulaire de l'espace client
// function validateForm(event) {
//     event.preventDefault();

//     const lastname = document.querySelector("#lastname");
//     const firstname = document.querySelector("#firstname");
//     const phoneNumber = document.querySelector("#phoneNumber");
//     const mailInfo = document.querySelector("#mailInfo");

//     if (lastname.value.trim() === "") {
//         alert("Veuillez saisir un nom.");
//         return;
//     }

//     if (firstname.value.trim() === "") {
//         alert("Veuillez saisir un prénom.");
//         return;
//     }

//     if (phoneNumber.value.trim() === "") {
//         alert("Veuillez saisir un numéro de téléphone.");
//         return;
//     }

//     if (mailInfo.value.trim() === "") {
//         alert("Veuillez saisir une adresse e-mail.");
//         return;
//     }

//     document.querySelector("form").submit();
// }

// // Fonction principale exécutée lorsque le DOM est prêt
// function main() {
//     const form = document.querySelector("form");

//     // Ajoutez un écouteur d'événement pour la soumission du formulaire
//     form.addEventListener("submit", validateForm);
// }

// // Exécute la fonction principale lorsque le DOM est prêt
// document.addEventListener("DOMContentLoaded", main);


