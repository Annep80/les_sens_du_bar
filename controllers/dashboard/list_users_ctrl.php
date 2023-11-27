<?php
// Inclure les fichiers nécessaires
require_once __DIR__ . '/../../models/User_register.php';


// Démarrer la session
session_start();

// Vérifier si l'utilisateur a le rôle requis (rôle avec l'identifiant 1) pour accéder
if ($_SESSION['users_register']['id_roles'] != 1) {
    // Rediriger vers la page d'accueil si l'utilisateur n'a pas le rôle requis
    header('location: /../../controllers/home-ctrl.php');
}
try {
    // Récupérer la liste de toutes les images du slider
    $users = User_register::getAll();
} catch (\Throwable $th) {
    // Gérer les erreurs
    $error = $th->getMessage();

    include __DIR__ . '/../../views/dashboard/templates/dashboard_header.php';
    include __DIR__ . '/../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../views/templates/footer.php';
    die;
}


include __DIR__ . '/../../views/dashboard/templates/dashboard_header.php';
include __DIR__ . '/../../views/dashboard/list_users.php';
include __DIR__ . '/../../views/templates/footer.php';
