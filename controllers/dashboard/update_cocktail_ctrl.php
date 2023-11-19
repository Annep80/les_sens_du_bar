<?php
require_once __DIR__ . '/../../config/regex.php';
require_once __DIR__ . '/../../models/Cocktail.php';


try {
    // Récupération du paramètre d'URL correspondant à l'id de la catégorie cliquée
    $id_cocktail = intval(filter_input(INPUT_GET, 'id_cocktail', FILTER_SANITIZE_NUMBER_INT));
    $cocktails = Cocktail::get($id_cocktail);


    // Si les données du formulaire ont été transmises
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Récupération, nettoyage et validation des données
        
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $ingredients = filter_input(INPUT_POST, 'ingredients', FILTER_SANITIZE_SPECIAL_CHARS);
        $stages = filter_input(INPUT_POST, 'stages', FILTER_SANITIZE_SPECIAL_CHARS);

        if (!$id_cocktail) {
            $error['id_cocktail'] = 'Ce champ est obligatoire!';
        } else {
            if (!Cocktail::get($id_cocktail)) {
                $error['id_cocktail'] = 'Ce cocktail n\'existe pas!';
            }
        }

        if (!$name) {
            $error['name'] = 'Ce champ est obligatoire!';
        } else {
            $isOk = filter_var($name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/" . NAME_REGEX . "/")));
            if (!$isOk) {
                $error['name'] = 'Cette valeur n\'est pas correcte';
            }
        }

        if (!$ingredients) {
            $error['ingredients'] = 'Ce champ est obligatoire!';
        } else {
            $isOk = filter_var($ingredients, FILTER_SANITIZE_SPECIAL_CHARS);
            if (!$isOk) {
                $error['ingredients'] = 'Cette valeur n\'est pas correcte';
            }
        }

        if (!$stages) {
            $error['stages'] = 'Ce champ est obligatoire!';
        } else {
            $isOk = filter_var($stages, FILTER_SANITIZE_SPECIAL_CHARS);
            if (!$isOk) {
                $error['stages'] = 'Cette valeur n\'est pas correcte';
            }
        }

        // Enregistrement du fichier localement sur le serveur
        $pictures_name = $cocktails->pictures_name;
        if (!empty($_FILES['pictures_name']['name'])) {
            try {
                $pictures_name = ($_FILES['pictures_name']);
                if (empty($pictures_name['name'])) {
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
                $from = $_FILES['pictures_name']['tmp_name'];
                $to = __DIR__ . '/../../public/uploads/cocktail/' . $newnamefile;
                move_uploaded_file($from, $to);
            } catch (\Throwable $th) {
                $error = $th->getMessage();
                include __DIR__ . '/../../../views/dashboard/templates/error.php';
                die;
            }
        }


        // Enregistrement en base de données
        if (empty($error)) {
            // Création d'un nouvel objet issu de la classe 'Cocktail'
            $cocktailObj = new Cocktail();
            // Hydratation de notre objet
            $cocktailObj->set_id_cocktail($id_cocktail);
            $cocktailObj->set_pictures_name($newnamefile);
            $cocktailObj->set_name($name);
            $cocktailObj->set_ingredients($ingredients);
            $cocktailObj->set_stages($stages);

            // Appel de la méthode insert
            $isOk = $cocktailObj->update();

            // Si la méthode a retourné "true", alors on redirige vers la liste
            if ($isOk) {
                header('location: /controllers/dashboard/list_cocktail_ctrl.php');
                die;
            }
        }
    }
} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../views/dashboard/templates/dashboard_header.php';
    include __DIR__ . '/../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../views/templates/footer.php';
    die;
}

include __DIR__ . '/../../views/dashboard/templates/dashboard_header.php';
include __DIR__ . '/../../views/dashboard/update_cocktail.php';
include __DIR__ . '/../../views/templates/footer.php';
