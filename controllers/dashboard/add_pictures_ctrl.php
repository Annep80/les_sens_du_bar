<?php
require_once __DIR__ . ('/../../models/SliderPictures.php');
require_once __DIR__ . ('/../../config/const.php');
require_once __DIR__ . ('/../../config/regex.php');


$newnamefile = '';
    try {

        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $pictures_name = ($_FILES['pictures_name']);


            if (empty($pictures_name)) {
                throw new Exception("Veuillez entrer un fichier", 1);
            }
            if ($pictures_name['error'] > 0) {
                throw new Exception("Fichier non envoyé", 2);
            }
            if (!in_array($pictures_name['type'], EXTENSION)) {
                throw new Exception("Veuillez entrer un fichier valide ( soit .png, .jpg, .jpeg, .gif)", 3);
            }
            if ($pictures_name['size'] > FILESIZE) {
                throw new Exception('Veuillez entrer un fichier avec une taille inferieur', 4);
            }
            $extension = pathinfo($pictures_name['name'], PATHINFO_EXTENSION);
            $newnamefile = uniqid('img_') . '.' . $extension;
            $from = $pictures_name['tmp_name'];
            $to = __DIR__ . '/../../public/uploads/slider/' . $newnamefile;
            move_uploaded_file($from, $to);
        }
    if (empty($errors)) {
        $newPicture = new Slider();
        $newPicture->setpictures_name($newnamefile);
        // Insérer dans la base de données
        $saved = $newPicture->insert();

        if ($saved) {
            $message = 'Photo enregistré avec succès';
        } else {
            $errors['slider'] = 'Erreur lors de l\'enregistrement de l\'image dans la base de données';
        }
    }
} catch (\Throwable $th) {
    $error = $th->getMessage();
    die;
    include __DIR__ . '/../../views/dashboard/templates/error.php';
}
include __DIR__ . '/../../views/dashboard/templates/dashboard_header.php';
include __DIR__ . '/../../views/dashboard/add_pictures_slider.php';
include __DIR__ . '/../../views/templates/footer.php';



