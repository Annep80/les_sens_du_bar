<?php
require_once __DIR__ . ('/../../models/Cocktail.php');
require_once __DIR__ . ('/../../config/const.php');
require_once __DIR__ . ('/../../config/regex.php');


try {

    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $cocktails_pictures_name = ($_FILES['cocktails_pictures_name']);
        $cocktail_name = ($_POST['cocktail_name']);  // Assuming that 'cocktail_name' is submitted via POST

        if (empty($cocktails_pictures_name)) {
            throw new Exception("Veuillez entrer un fichier", 1);
        }
        if ($cocktails_pictures_name['error'] > 0) {
            throw new Exception("Fichier non envoyé", 2);
        }
        if (!in_array($cocktails_pictures_name['type'], EXTENSION)) {
            throw new Exception("Veuillez entrer un fichier valide ( soit .png, .jpg, .jpeg, .gif)", 3);
        }
        if ($cocktails_pictures_name['size'] > FILESIZE) {
            throw new Exception('Veuillez entrer un fichier avec une taille inférieure', 4);
        }

        // Upload the picture
        $extension = pathinfo($cocktails_pictures_name['name'], PATHINFO_EXTENSION);
        $newnamefile = uniqid('img_') . '.' . $extension;
        $from = $cocktails_pictures_name['tmp_name'];
        $to = __DIR__ . '/../../public/uploads/cocktail/' . $newnamefile;
        move_uploaded_file($from, $to);

        // Save data to the database
        if (empty($errors)) {
            $newPicture = new Cocktail();
            $newPicture->set_cocktails_pictures_name($newnamefile);
            $newPicture->set_cocktail_name($cocktail_name);  // Set the cocktail_name property

            // Insert into the database
            $saved = $newPicture->insert();

            if ($saved) {
                $message = 'Photo et nom du cocktail enregistrés avec succès';
            } else {
                $errors['cocktail'] = 'Erreur lors de l\'enregistrement de l\'image et du nom du cocktail dans la base de données';
            }
        }
    }
} catch (\Throwable $th) {
$error = $th->getMessage();
// var_dump($th);
// die;
include __DIR__ . '/../../views/dashboard/templates/error.php';
}




include __DIR__ . '/../../views/dashboard/templates/dashboard_header.php';
include __DIR__ . '/../../views/dashboard/add_cocktail.php';
include __DIR__ . '/../../views/templates/footer.php';