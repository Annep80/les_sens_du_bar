<?php
// Inclure le fichier contenant la définition de la classe User_register
require_once __DIR__ . '/../models/User_register.php';

// Supprimer la variable de session 'users_register'
unset($_SESSION['users_register']);

// Régénérer l'ID de session pour des raisons de sécurité
session_regenerate_id();
// Supprimer le cookie de session en le rendant expiré
setcookie(session_name(), '', time() - 3600, '/');
// Rediriger vers la page d'accueil après la déconnexion
header('location: /../controllers/home-ctrl.php');
die;
