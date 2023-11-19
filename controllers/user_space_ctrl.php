<?php
require_once __DIR__ . '/../models/User_register.php';
require_once __DIR__ . '/../config/init.php';

try {

    $id_users = $_SESSION['users_register']['id_users'];
    $userArray = User_register::get($id_users);

    $action = filter_input(INPUT_GET, 'action',FILTER_SANITIZE_SPECIAL_CHARS);

    $update = filter_input(INPUT_GET,'update',FILTER_SANITIZE_SPECIAL_CHARS);

    

    // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //     $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
    //     $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
    //     $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
    //     $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_SPECIAL_CHARS);
    //     $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS);
    //     $zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_SPECIAL_CHARS);
    //     $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);

    //     if (!$firstname) {
    //         $errors['firstname'] = 'Ce champ est obligatoire!';
    //     } else {
    //         if (!User_register::get($firstname)) {
    //             $errors['firstname'] = 'Cette catégorie est inconnue!';
    //         }
    //     }
    //     if (!$lastname) {
    //         $errors['lastname'] = 'Ce champ est obligatoire!';
    //     } else {
    //         if (!User_register::get($lastname)) {
    //             $errors['lastname'] = 'Cette catégorie est inconnue!';
    //         }
    //     }
    //     if (!$phone) {
    //         $errors['phone'] = 'Ce champ est obligatoire!';
    //     } else {
    //         if (!User_register::get($phone)) {
    //             $errors['phone'] = 'Cette catégorie est inconnue!';
    //         }
    //     }
    //     if (!$mail) {
    //         $errors['mail'] = 'Ce champ est obligatoire!';
    //     } else {
    //         if (!User_register::get($mail)) {
    //             $errors['mail'] = 'Cette catégorie est inconnue!';
    //         }
    //     }
    //     if (!$address) {
    //         $errors['address'] = 'Ce champ est obligatoire!';
    //     } else {
    //         if (!User_register::get($address)) {
    //             $errors['address'] = 'Cette catégorie est inconnue!';
    //         }
    //     }
    //     if (!$zipcode) {
    //         $errors['zipcode'] = 'Ce champ est obligatoire!';
    //     } else {
    //         if (!User_register::get($zipcode)) {
    //             $errors['zipcode'] = 'Cette catégorie est inconnue!';
    //         }
    //     }
    //     if (!$city) {
    //         $errors['city'] = 'Ce champ est obligatoire!';
    //     } else {
    //         if (!User_register::get($city)) {
    //             $errors['city'] = 'Cette catégorie est inconnue!';
    //         }
    //     }
    // }
    // if (empty($errors)) {
    //     // Création d'un nouvel objet issu de la classe 'Vehicle'
    //     $userObj = new User_register();
    //     // Hydratation de notre objet
    //     $userObj->set_firstname($firstname);
    //     $userObj->set_lastname($lastname);
    //     $userObj->set_phone($phone);
    //     $userObj->set_mail($mail);
    //     $userObj->set_address($address);
    //     $userObj->set_zipcode($zipcode);
    //     $userObj->set_city($city);

    //     // Appel de la méthode insert
    //     $isOk = $userObj->update();

    //     // Si la méthode a retourné "true", alors on redirige vers la liste
    //     if ($isOk) {
    //         header('location: /../controllers/user_space_ctrl.php');
    //         die;
    //     }
    // }
} catch (Throwable $th) {
    $error = $th->getMessage();
}
include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/user_space.php';
include __DIR__ . '/../views/templates/footer.php';
