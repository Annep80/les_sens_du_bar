
<?php
require_once __DIR__ . '/../models/SliderPictures.php';
require_once __DIR__ . '/../models/Contact.php';
require_once __DIR__ . '/../config/regex.php';
session_start();

try {
    $sliderPictures = Slider::getAll();
    $errors = [];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);

        $contact = new Contact();

        $contact->set_lastname($lastname);
        $contact->set_firstname($firstname);
        $contact->set_phone($phone);
        $contact->set_email($email);
        $contact->set_message($message);


        $saved = $contact->insert();

        if ($saved) {
            $message = 'Message bien envoyé';
            header('location: /../controllers/home-ctrl.php');
            die;
        } else {
            $errors['contact'] = 'Erreur lors de l\'envoi de votre message';
        }
    }
} catch (\Throwable $th) {
    $error = $th->getMessage();

    include __DIR__ . '/../views/templates/header.php';
    include __DIR__ . '/../views/home.php';
    include __DIR__ . '/../views/templates/footer.php';
    die;
}

include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/home.php';
include __DIR__ . '/../views/templates/footer.php';
