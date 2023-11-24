<?php
// Inclure les fichiers nécessaires
require_once __DIR__ . '/../models/SliderPictures.php';
require_once __DIR__ . '/../models/Contact.php';
require_once __DIR__ . '/../config/regex.php';
// Démarrer la session
session_start();

try {
    // Récupérer toutes les images du slider
    $sliderPictures = Slider::getAll();
    // Initialiser le tableau des erreurs
    $errors = [];
    // Vérifier si le formulaire de contact a été soumis (méthode POST)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Récupérer et nettoyer les données du formulaire
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
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
        if (empty($message)) {
            $errors['message'] = 'Le champs message ne peut pas être vide';
        }
        // Si les champs sont valides, créer un nouvel objet Contact
        if (empty($errors)) {
            $contact = new Contact();
            // Définir les propriétés de l'objet avec les données du formulaire
            $contact->set_lastname($lastname);
            $contact->set_firstname($firstname);
            $contact->set_phone($phone);
            $contact->set_email($email);
            $contact->set_message($message);

            // Insérer les données dans la base de données
            $saved = $contact->insert();
            // Vérifier si l'insertion a réussi
            if ($saved) {
                $message = 'Message bien envoyé';
                // Rediriger vers la page d'accueil
                header('location: /../controllers/home-ctrl.php');
                die;
            } else {
                $errors['contact'] = 'Erreur lors de l\'envoi de votre message';
            }
        }
    }
} catch (\Throwable $th) {
    // Gérer les erreurs générales
    $error = $th->getMessage();

    include __DIR__ . '/../views/templates/header.php';
    include __DIR__ . '/../views/home.php';
    include __DIR__ . '/../views/templates/footer.php';
    die;
}

include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/home.php';
include __DIR__ . '/../views/templates/footer.php';
