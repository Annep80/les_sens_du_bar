<?php

require_once __DIR__ . ('/../models/User_register.php');
require_once __DIR__ . ('/../config/const.php');
require_once __DIR__ . ('/../config/regex.php');

try {

    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
        $birthday = filter_input(INPUT_POST, 'birthday', FILTER_SANITIZE_SPECIAL_CHARS);
        $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_SPECIAL_CHARS);
        $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL);
        $address = filter_input(INPUT_POST, 'adress', FILTER_SANITIZE_SPECIAL_CHARS);
        $zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_NUMBER_INT);
        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password');
        $passwordVerify = filter_input(INPUT_POST, 'passwordVerify');

        
        if ($password !== $passwordVerify) {
            $errors['password'] = 'Les mots de passe ne sont pas identiques!';
        }

        // Hash du password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $hashedPasswordVerify = password_hash($passwordVerify, PASSWORD_BCRYPT);

        $user = new User_register();

        $user->set_lastname($lastname);
        $user->set_firstname($firstname);
        $user->set_birthday($birthday);
        $user->set_phone($tel);
        $user->set_mail($mail);
        $user->set_address($address);
        $user->set_zipcode($zipcode);
        $user->set_city($city);
        $user->set_password($hashedPassword); 
        $user->set_confirm($hashedPasswordVerify);

        $saved = $user->insert();

        if ($saved) {
            $message = 'Inscription validée';
            header('location: /../controllers/signIn-ctrl.php');

        } else {
            $errors['user_register'] = 'Erreur lors de l\'enregistrement de votre profil';
        }
    }
} catch (\Throwable $th) {
    $error = $th->getMessage();
    

    $errors['user_register'] = 'Une erreur s\'est produite lors du traitement de votre demande. Veuillez réessayer plus tard.';
    include __DIR__ . '/../views/dashboard/templates/error.php';
}






include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/sign_up.php';
include __DIR__ . '/../views/templates/footer.php';
