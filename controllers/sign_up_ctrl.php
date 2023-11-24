<?php
// Inclure les fichiers nécessaires
require_once __DIR__ . ('/../models/User_register.php');
require_once __DIR__ . ('/../config/const.php');
require_once __DIR__ . ('/../config/regex.php');

try {
    // Initialiser le tableau des erreurs
    $errors = [];
    // Vérifier si le formulaire a été soumis (méthode POST)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Récupérer et nettoyer les données du formulaire
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
        $birthday = filter_input(INPUT_POST, 'birthday', FILTER_SANITIZE_SPECIAL_CHARS);
        $phone = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL);
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS);
        $zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_NUMBER_INT);
        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password');
        $passwordVerify = filter_input(INPUT_POST, 'passwordVerify');

        // Valider les champs du formulaire
        if (empty($lastname)) {
            $errors['lastname'] = 'Le champs Nom ne peut pas être vide';
        }
        if (empty($firstname)) {
            $errors['firstname'] = 'Le champs prénom ne peut pas être vide';
        }
        if (empty($phone)) {
            $errors['phone'] = 'Le champs numéro de téléphone ne peut pas être vide';
        }
        if (empty($email)) {
            $errors['email'] = 'Le champs email ne peut pas être vide';
        }
        if (empty($address)) {
            $errors['address'] = 'Le champs adresse ne peut pas être vide';
        }
        if (empty($zipcode)) {
            $errors['zipcode'] = 'Le champs code postal ne peut pas être vide';
        }
        if (empty($city)) {
            $errors['city'] = 'Le champs ville ne peut pas être vide';
        }
        if (empty($password)) {
            $errors['password'] = 'Le champs mot de passe ne peut pas être vide';
        }
        if (empty($passwordVerify)) {
            $errors['passwordVerify'] = 'Le champs confirmation mot de passe ne peut pas être vide';
        }

        // Vérifier si les mots de passe correspondent
        if ($password !== $passwordVerify) {
            $errors['password'] = 'Les mots de passe ne sont pas identiques!';
        }

        if (empty($errors)) {
            // Hasher le mot de passe
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $hashedPasswordVerify = password_hash($passwordVerify, PASSWORD_BCRYPT);
            // Créer un nouvel objet User_register
            $user = new User_register();
            // Définir les propriétés de l'objet avec les données du formulaire
            $user->set_lastname($lastname);
            $user->set_firstname($firstname);
            $user->set_birthday($birthday);
            $user->set_phone($phone);
            $user->set_mail($email);
            $user->set_address($address);
            $user->set_zipcode($zipcode);
            $user->set_city($city);
            $user->set_password($hashedPassword);
            $user->set_confirm($hashedPasswordVerify);
            // Insérer les données dans la base de données
            $saved = $user->insert();
            if ($saved) {
                $message = 'Inscription validée';
                // Rediriger vers la page de connexion
                header('location: /../controllers/signIn-ctrl.php');
            } else {
                $errors['user_register'] = 'Erreur lors de l\'enregistrement de votre profil';
            }
        }
        // Vérifier si l'insertion a réussi

    }
} catch (\Throwable $th) {
    // Gérer les erreurs générales
    $error = $th->getMessage();

    // Ajouter une erreur générale
    $errors['user_register'] = 'Une erreur s\'est produite lors du traitement de votre demande. Veuillez réessayer plus tard.';
    // Inclure le fichier d'erreur
    include __DIR__ . '/../views/dashboard/templates/error.php';
}






include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/sign_up.php';
include __DIR__ . '/../views/templates/footer.php';
