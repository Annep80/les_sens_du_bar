<?php
require_once __DIR__ . '/../models/User_register.php';


session_start();

try {

    $id_users = $_SESSION['users_register']['id_users'];
    $userArray = User_register::get($id_users);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
        $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_SPECIAL_CHARS);
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS);
        $zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_SPECIAL_CHARS);
        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);

        if (!$firstname) {
            $error['firstname'] = 'Ce champ est obligatoire!';
        } else {
            if (!User_register::get($firstname)) {
                $error['firstname'] = 'Cette catégorie est inconnue!';
            }
        }
        if (!$lastname) {
            $error['lastname'] = 'Ce champ est obligatoire!';
        } else {
            if (!User_register::get($lastname)) {
                $error['lastname'] = 'Cette catégorie est inconnue!';
            }
        }
        if (!$phone) {
            $error['phone'] = 'Ce champ est obligatoire!';
        } else {
            if (!User_register::get($phone)) {
                $error['phone'] = 'Cette catégorie est inconnue!';
            }
        }
        if (!$mail) {
            $error['mail'] = 'Ce champ est obligatoire!';
        } else {
            if (!User_register::get($mail)) {
                $error['mail'] = 'Cette catégorie est inconnue!';
            }
        }
        if (!$address) {
            $error['address'] = 'Ce champ est obligatoire!';
        } else {
            if (!User_register::get($address)) {
                $error['address'] = 'Cette catégorie est inconnue!';
            }
        }
        if (!$zipcode) {
            $error['zipcode'] = 'Ce champ est obligatoire!';
        } else {
            if (!User_register::get($zipcode)) {
                $error['zipcode'] = 'Cette catégorie est inconnue!';
            }
        }
        if (!$city) {
            $error['city'] = 'Ce champ est obligatoire!';
        } else {
            if (!User_register::get($city)) {
                $error['city'] = 'Cette catégorie est inconnue!';
            }
        }
    }
    if (empty($error)) {
        // Création d'un nouvel objet issu de la classe 'Vehicle'
        $userObj = new User_register();
        // Hydratation de notre objet
        $userObj->set_firstname($firstname);
        $userObj->set_lastname($lastname);
        $userObj->set_phone($phone);
        $userObj->set_mail($mail);
        $userObj->set_address($address);
        $userObj->set_zipcode($zipcode);
        $userObj->set_city($city);

        // Appel de la méthode insert
        $isOk = $userObj->update();

        // Si la méthode a retourné "true", alors on redirige vers la liste
        if ($isOk) {
            header('location: /../controllers/user_space_ctrl.php');
            die;
        }
    }
} catch (Throwable $th) {

    $error = $th->getMessage();
}
include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/user_space.php';
include __DIR__ . '/../views/templates/footer.php';
