<?php
// Inclure la classe User_register
require_once __DIR__ . '/../models/User_register.php';
// Démarrer la session
session_start();  // Start the session

try {
    // Vérifier si l'utilisateur est connecté
    if (!isset($_SESSION['users_register']['id_users'])) {
        // L'utilisateur n'est pas connecté, rediriger vers la page de connexion
        header('Location: /../controllers/signIn-ctrl.php');
        exit;
    } else {
        // L'utilisateur est connecté, récupérer les données de l'utilisateur
        $id_users = $_SESSION['users_register']['id_users'];
        $userArray = User_register::get($id_users);
        // Récupérer les paramètres d'URL
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
        $update = filter_input(INPUT_GET, 'update', FILTER_SANITIZE_SPECIAL_CHARS);
    }
} catch (Throwable $th) {
    $error = $th->getMessage();
    // Enregistrer l'erreur ou afficher un message d'erreur à l'utilisateur
}
// Inclure le fichier d'en-tête
include __DIR__ . '/../views/templates/header.php';

// Vérifier si l'utilisateur est connecté (ajout d'une vérification pour éviter d'afficher du contenu lors de la redirection)
if (isset($_SESSION['users_register']['id_users'])) {
    // Inclure le contenu de l'espace utilisateur
    include __DIR__ . '/../views/user_space.php';
} else {
    // L'utilisateur n'est pas connecté, donc inclure le formulaire de connexion ou le contenu pertinent
    include __DIR__ . '/../views/login_form.php';
}
// Inclure le fichier de pied de page
include __DIR__ . '/../views/templates/footer.php';
