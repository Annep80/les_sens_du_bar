<?php
require_once __DIR__ . ('/../../models/Cocktail.php');
require_once __DIR__ . ('/../../config/const.php');
require_once __DIR__ . ('/../../config/regex.php');


try {

    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $ingredients = filter_input(INPUT_POST, 'ingredients', FILTER_SANITIZE_SPECIAL_CHARS);
        $stages = filter_input(INPUT_POST, 'stages', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($name)) {
            $errors['name'] = 'Le champ Photo du cocktail ne peut pas être vide.';
        } else {
            $isOk = filter_var($name, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/' . TEXTAREA_REGEX . '/')));
            if (!$isOk) {
                $errors['name'] = 'Veuillez entrer une image valide';
            }
        }
        if (empty($ingredients)) {
            $errors['ingredients'] = 'Le champ Ingrédients ne peut pas être vide.';
        } else {
            $isOk = filter_var($ingredients,FILTER_SANITIZE_SPECIAL_CHARS );
            if (!$isOk) {
                $errors['ingredients'] = 'Veuillez entrer un ingrédient valide';
            }
        }
        if (empty($stages)) {
            $errors['stages'] = 'Le champ Etapes ne peut pas être vide.';
        } else {
            $isOk = filter_var($stages,FILTER_SANITIZE_SPECIAL_CHARS);
            if (!$isOk) {
                $errors['stages'] = 'Veuillez entrer une étape valide';
            }
        }

        
        try {
            $picture = ($_FILES['pictures_name']);
            if (empty($picture['name'])) {
                throw new Exception("Veuillez entrer un fichier", 1);
            }
            if ($picture['error'] > 0) {
                throw new Exception("Fichier non envoyé", 2);
            }
            if (!in_array($picture['type'], EXTENSION)) {
                throw new Exception("Veuillez entrer un fichier valide ( soit .png, .jpg, .jpeg, .gif)", 3);
            }
            if ($picture['size'] > FILESIZE) {
                throw new Exception('Veuillez entrer un fichier avec une taille inferieur',4);
            }
            $extension = pathinfo($picture['name'], PATHINFO_EXTENSION);
            $newnamefile = uniqid('img_') . '.' . $extension;
            $from = $picture['tmp_name'];
            $to = __DIR__ . '/../../public/uploads/cocktail/' . $newnamefile;
            move_uploaded_file($from, $to);
        } catch (\Throwable $th) {
            $errors['picture'] = $th->getMessage();
        }
        // Save data to the database
        if (empty($errors)) {
            $newCocktail = new Cocktail();
            $newCocktail->set_pictures_name($newnamefile);
            $newCocktail->set_name($name); 
            $newCocktail->set_ingredients($ingredients); 
            $newCocktail->set_stages($stages);
            // Insert into the database
            $saved = $newCocktail->insert();

            if ($saved) {
                $message = 'Cocktail enregistré avec succès';
            } else {
                $errors['cocktail'] = 'Erreur lors de l\'enregistrement du cocktail dans la base de données';
            }
        }
    }
} catch (\Throwable $th) {
$error = $th->getMessage();
var_dump($th);
die;
include __DIR__ . '/../../views/dashboard/templates/error.php';
}




include __DIR__ . '/../../views/dashboard/templates/dashboard_header.php';
include __DIR__ . '/../../views/dashboard/add_cocktail.php';
include __DIR__ . '/../../views/templates/footer.php';