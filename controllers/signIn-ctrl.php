<?php
session_start();

require_once __DIR__ . '/../models/User_register.php';

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $datas = filter_input_array(INPUT_POST, [
            "mail" => FILTER_SANITIZE_EMAIL,
            "password" => FILTER_DEFAULT
        ]);
        $errors = [];

        if (empty($errors)) {
            // Use a prepared statement to retrieve the user by email
            $userData = User_register::get_userByEmail($datas["mail"]);


            try {
                // Check if a user was found
                if (!$userData || !is_array($userData)) {
                    throw new Exception("Échec d'authentification - Adresse mail introuvable", 1);
                }

                // Check if 'id_users' key exists in the array
                if (!array_key_exists('id_users', $userData)) {
                    throw new Exception("Échec d'authentification - Données utilisateur invalides", 3);
                }

                // Use password_verify to check the password
                $isOk = password_verify($datas["password"], $userData['password']);

                if (!$isOk) {
                    throw new Exception("Échec d'authentification - Mot de passe incorrect", 2);
                }
                unset($user->password);
                // Use a consistent session variable key
                $_SESSION['users_register'] = $userData;
                // Redirect to user space after successful login
                header('location: /controllers/user_space_ctrl.php');
                die;
            } catch (Exception $e) {
                $errors["mail"] = $e->getMessage();
            }
        }
    }
} catch (Throwable $th) {
    // Log unexpected error
    $error = $th->getMessage();
    

    // Display a generic error message to the user
    $errors['user_login'] = 'Une erreur s\'est produite lors de la connexion. Veuillez réessayer plus tard.';
}


include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/signIn.php';
include __DIR__ . '/../views/templates/footer.php';
