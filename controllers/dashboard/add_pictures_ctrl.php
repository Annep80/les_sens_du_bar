<?php
// Inclure les fichiers nécessaires
require_once __DIR__ . ('/../../models/SliderPictures.php');
require_once __DIR__ . ('/../../config/const.php');
require_once __DIR__ . ('/../../config/regex.php');

// Démarrer la session
session_start();

// Vérifier si l'utilisateur a le rôle requis (rôle avec l'identifiant 1) pour accéder
if ($_SESSION['users_register']['id_roles'] != 1) {
    // Rediriger vers la page d'accueil si l'utilisateur n'a pas le rôle requis
    header('location: /../../controllers/home-ctrl.php');
}
// Initialiser une variable pour le nouveau nom du fichier
$newnamefile = '';
try {
    // Tableau pour stocker les erreurs
    $errors = [];
    // Vérifier si le formulaire est soumis en utilisant la méthode POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Récupérer le fichier téléchargé
        $pictures_name = ($_FILES['pictures_name']);

        // Vérifier si un fichier a été sélectionné
        if (empty($pictures_name)) {
            throw new Exception("Veuillez entrer un fichier", 1);
        }
        // Vérifier s'il y a des erreurs lors du téléchargement du fichier
        if ($pictures_name['error'] > 0) {
            throw new Exception("Fichier non envoyé", 2);
        }
        // Vérifier le type de fichier
        if (!in_array($pictures_name['type'], EXTENSION)) {
            throw new Exception("Veuillez entrer un fichier valide ( soit .png, .jpg, .jpeg, .gif)", 3);
        }
        // Vérifier la taille du fichier
        if ($pictures_name['size'] > FILESIZE) {
            throw new Exception('Veuillez entrer un fichier avec une taille inferieur', 4);
        }
        // Générer un nom unique pour le fichier
        $extension = pathinfo($pictures_name['name'], PATHINFO_EXTENSION);
        $newnamefile = uniqid('img_') . '.' . $extension;
        // Définir les chemins source et destination pour le déplacement du fichier téléchargé
        $from = $pictures_name['tmp_name'];
        $to = __DIR__ . '/../../public/uploads/slider/' . $newnamefile;
        // Déplacer le fichier téléchargé vers le répertoire d'uploads
        move_uploaded_file($from, $to);

        // S'il n'y a pas d'erreurs jusqu'à présent
        if (empty($errors)) {
            // Créer une instance de la classe SliderPictures
            $newPicture = new Slider();
            // Définir le nom du fichier dans l'objet SliderPictures
            $newPicture->setpictures_name($newnamefile);
            // Insérer l'objet SliderPictures dans la base de données
            $saved = $newPicture->insert();

            // Vérifier si l'enregistrement a réussi
            if ($saved) {
                $message = 'Photo enregistré avec succès';
            } else {
                // S'il y a une erreur lors de l'enregistrement dans la base de données
                $errors['slider'] = 'Erreur lors de l\'enregistrement de l\'image dans la base de données';
            }
        }
    }
} catch (\Throwable $th) {
    // Gérer les erreurs générales
    $error = $th->getMessage();
    die;
    include __DIR__ . '/../../views/dashboard/templates/error.php';
}
// Inclure les fichiers de l'interface utilisateur (header, formulaire d'ajout d'image pour le slider, footer)
include __DIR__ . '/../../views/dashboard/templates/dashboard_header.php';
include __DIR__ . '/../../views/dashboard/add_pictures_slider.php';
include __DIR__ . '/../../views/templates/footer.php';
