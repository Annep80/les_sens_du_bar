<?php


// Démarrer la session
session_start();
// Vérifier si l'utilisateur a le rôle admin pour accéder
if ($_SESSION['users_register']['id_roles'] != 1) {
    // Rediriger vers la page d'accueil si l'utilisateur n'a pas le rôle requis
    header('location: /../../controllers/home-ctrl.php');
}



include __DIR__ . '/../../views/dashboard/templates/dashboard_header.php';
include __DIR__ . '/../../views/dashboard/dashboard_home.php';
include __DIR__ . '/../../views/templates/footer.php';
