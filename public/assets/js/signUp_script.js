// signUp_script.js

document.addEventListener('DOMContentLoaded', function () {
    const btnSignIn = document.querySelector('.btnSingIn');

    function validateForm() {
        const lastname = document.getElementById('lastname').value.trim();
        const firstname = document.getElementById('firstname').value.trim();
        const birthday = document.getElementById('birthday').value.trim();
        const phoneNumber = document.getElementById('phoneNumber').value.trim();
        const mailInfo = document.getElementById('mailInfo').value.trim();
        const adress = document.getElementById('adress').value.trim();
        const zipcode = document.getElementById('zipcode').value.trim();
        const city = document.getElementById('city').value.trim();
        const password = document.getElementById('password').value.trim();
        const passwordVerify = document.getElementById('passwordVerify').value.trim();

        let validationMessage = '';

        // Validation regex pour le numéro de téléphone (10 chiffres)
        const phoneRegex = /^\d{10}$/;
        if (!phoneRegex.test(phoneNumber)) {
            validationMessage += 'Le numéro de téléphone doit contenir 10 chiffres.\n';
        }

        // Validation regex pour l'adresse e-mail
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(mailInfo)) {
            validationMessage += 'L\'adresse e-mail n\'est pas valide.\n';
        }

        // Validation regex pour le mot de passe (au moins 12 caractères, une majuscule, un chiffre et un caractère spécial)
        const passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{12,}$/;
        if (!passwordRegex.test(password)) {
            validationMessage += 'Le mot de passe doit contenir au moins 12 caractères avec au moins une majuscule, un chiffre et un caractère spécial.\n';
        }

        if (password !== passwordVerify) {
            validationMessage += 'La confirmation du mot de passe ne correspond pas.\n';
        }

        if (!lastname || !firstname || !birthday || !phoneNumber || !mailInfo || !adress || !zipcode || !city || !password || !passwordVerify) {
            validationMessage += 'Tous les champs sont obligatoires.\n';
        }
        
        document.getElementById('validationMessage').innerHTML = validationMessage;
    }

    btnSignIn.addEventListener('click', validateForm);
});
