<?php
// Inclure la classe User_register
require_once __DIR__ . '/../models/User_register.php';
// Démarrer la session
session_start();
$title = 'Connexion - les sens du bar';
$metaDescription = 'Les sens du bar est un service de barman itinérant. 
                    Connectez-vous pour acceder à vos informations personnelles et devis';


try {
    // Vérifier si la méthode HTTP utilisée est POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Filtrer et récupérer les données du formulaire
        $datas = filter_input_array(INPUT_POST, [
            "mail" => FILTER_SANITIZE_EMAIL,
            "password" => FILTER_DEFAULT
        ]);
        // Initialiser le tableau des erreurs
        $errors = [];
        // Vérifier si des erreurs existent
        if (empty($errors)) {
            // Utiliser une requête préparée pour récupérer l'utilisateur par son adresse e-mail
            $userData = User_register::get_userByEmail($datas["mail"]);


            try {
                // Vérifier si un utilisateur a été trouvé
                if (!$userData || !is_array($userData)) {
                    throw new Exception("Échec d'authentification - Adresse mail introuvable", 1);
                }

                // Vérifier si la clé 'id_users' existe dans le tableau
                if (!array_key_exists('id_users', $userData)) {
                    throw new Exception("Échec d'authentification - Données utilisateur invalides", 3);
                }

                // Utiliser password_verify pour vérifier le mot de passe
                $isOk = password_verify($datas["password"], $userData['password']);

                if (!$isOk) {
                    throw new Exception("Échec d'authentification - Mot de passe incorrect", 2);
                }
                // Supprimer le champ 'password' pour des raisons de sécurité
                unset($user->password);
                // Utiliser une clé de session cohérente
                $_SESSION['users_register'] = $userData;
                // Rediriger vers l'espace utilisateur après une connexion réussie
                header('location: /controllers/user_space_ctrl.php');
                die;
            } catch (Exception $e) {
                // Ajouter l'erreur liée à l'authentification au tableau des erreurs
                $errors["mail"] = $e->getMessage();
            }
        }
    }
} catch (Throwable $th) {
    // Enregistrer une erreur imprévue
    $error = $th->getMessage();


    // Afficher un message d'erreur générique à l'utilisateur
    $errors['user_login'] = 'Une erreur s\'est produite lors de la connexion. Veuillez réessayer plus tard.';
}


include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/signIn.php';
include __DIR__ . '/../views/templates/footer.php';
