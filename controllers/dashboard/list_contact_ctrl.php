<?php
require_once __DIR__ . ('/../../models/Contact.php');
require_once __DIR__ . ('/../../helpers/FlashMessage.php');
require_once __DIR__ . ('/../../config/const.php');


// Inclure les fichiers nécessaires
session_start();
// Vérifier si l'utilisateur a le rôle requis (rôle avec l'identifiant 1) pour accéder
if ($_SESSION['users_register']['id_roles'] != 1) {
    // Rediriger vers la page d'accueil si l'utilisateur n'a pas le rôle requis
    header('location: /../../controllers/home-ctrl.php');
}


try {
    // Récupérer la liste de tous les contacts
    $contacts = Contact::getAll();
} catch (\Throwable $th) {
    // Gérer les erreurs
    $error = $th->getMessage();

    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    die;
}


// Inclure les fichiers de l'interface utilisateur (header, liste des contacts, footer)
include __DIR__ . '/../../views/dashboard/templates/dashboard_header.php';
include __DIR__ . '/../../views/dashboard/list_contact.php';
include __DIR__ . '/../../views/templates/footer.php';
