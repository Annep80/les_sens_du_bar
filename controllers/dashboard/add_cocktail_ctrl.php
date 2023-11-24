<?php
// Inclure les fichiers nécessaires
require_once __DIR__ . ('/../../models/Cocktail.php');
require_once __DIR__ . ('/../../config/const.php');
require_once __DIR__ . ('/../../config/regex.php');

// Démarrer la session
session_start();
// Vérifier si l'utilisateur a le rôle requis (rôle avec l'identifiant 1) pour accéder
if ($_SESSION['users_register']['id_roles'] != 1) {
    // Rediriger vers la page d'accueil si l'utilisateur n'a pas le rôle requis
    header('location: /../../controllers/home-ctrl.php');
}

try {
    // Tableau pour stocker les erreurs de validation
    $errors = [];
    // Vérifier si le formulaire est soumis en utilisant la méthode POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Nettoyer et valider les données d'entrée (nom, ingrédients, étapes)
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $ingredients = filter_input(INPUT_POST, 'ingredients', FILTER_SANITIZE_SPECIAL_CHARS);
        $stages = filter_input(INPUT_POST, 'stages', FILTER_SANITIZE_SPECIAL_CHARS);
        // Valider le nom
        if (empty($name)) {
            // S'il n'y a pas de nom, ajouter une erreur
            $errors['name'] = 'Le champ Photo du cocktail ne peut pas être vide.';
        } else {
            // Valider le nom en utilisant une expression régulière définie dans le fichier regex.php
            $isOk = filter_var($name, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/' . TEXTAREA_REGEX . '/')));
            if (!$isOk) {
                // Si la validation de l'expression régulière échoue, ajouter une autre erreur
                $errors['name'] = 'Veuillez entrer une image valide';
            }
        }
        // Valider les ingrédients
        if (empty($ingredients)) {
            // S'il n'y a pas d'ingrédients, ajouter une erreur
            $errors['ingredients'] = 'Le champ Ingrédients ne peut pas être vide.';
        } else {
            // Nettoyer les ingrédients
            $isOk = filter_var($ingredients, FILTER_SANITIZE_SPECIAL_CHARS);
            if (!$isOk) {
                // Si la validation échoue, ajouter une erreur
                $errors['ingredients'] = 'Veuillez entrer un ingrédient valide';
            }
        }
        // Valider les étapes
        if (empty($stages)) {
            // S'il n'y a pas d'étapes, ajouter une erreur
            $errors['stages'] = 'Le champ Etapes ne peut pas être vide.';
        } else {
            // Nettoyer les étapes
            $isOk = filter_var($stages, FILTER_SANITIZE_SPECIAL_CHARS);
            if (!$isOk) {
                // Si la validation échoue, ajouter une erreur
                $errors['stages'] = 'Veuillez entrer une étape valide';
            }
        }

        // Gérer le téléchargement du fichier (image du cocktail)
        try {
            $picture = ($_FILES['pictures_name']);
            if (empty($picture['name'])) {
                // Si aucun fichier n'est téléchargé, ajouter une erreur
                throw new Exception("Veuillez entrer un fichier", 1);
            }
            // Vérifier s'il y a des erreurs lors du téléchargement
            if ($picture['error'] > 0) {
                // Si une erreur de téléchargement se produit, ajouter une erreur
                throw new Exception("Fichier non envoyé", 2);
            }
            // Vérifier le type de fichier
            if (!in_array($picture['type'], EXTENSION)) {
                // Si le type de fichier n'est pas valide, ajouter une erreur
                throw new Exception("Veuillez entrer un fichier valide ( soit .png, .jpg, .jpeg, .gif)", 3);
            }
            // Vérifier la taille du fichier
            if ($picture['size'] > FILESIZE) {
                // Si la taille du fichier est trop grande, ajouter une erreur
                throw new Exception('Veuillez entrer un fichier avec une taille inferieur', 4);
            }
            // Générer un nom de fichier unique
            $extension = pathinfo($picture['name'], PATHINFO_EXTENSION);
            $newnamefile = uniqid('img_') . '.' . $extension;
            // Déplacer le fichier téléchargé vers le répertoire d'uploads
            $from = $picture['tmp_name'];
            $to = __DIR__ . '/../../public/uploads/cocktail/' . $newnamefile;
            move_uploaded_file($from, $to);
        } catch (\Throwable $th) {
            // Gérer les erreurs liées au téléchargement du fichier
            $errors['picture'] = $th->getMessage();
        }
        // Sauvegarder les données dans la base de données
        if (empty($errors)) {
            // Créer une instance de la classe Cocktail
            $newCocktail = new Cocktail();
            // Définir les propriétés du cocktail
            $newCocktail->set_pictures_name($newnamefile);
            $newCocktail->set_name($name);
            $newCocktail->set_ingredients($ingredients);
            $newCocktail->set_stages($stages);
            // Insérer dans la base de données
            $saved = $newCocktail->insert();

            // Vérifier si l'enregistrement a réussi
            if ($saved) {
                $message = 'Cocktail enregistré avec succès';
            } else {
                // Si l'enregistrement échoue, ajouter une erreur
                $errors['cocktail'] = 'Erreur lors de l\'enregistrement du cocktail dans la base de données';
            }
        }
    }
} catch (\Throwable $th) {
    // Gérer les erreurs générales
    $error = $th->getMessage();
    var_dump($th);
    die;
    // Inclure un fichier de gestion d'erreur
    include __DIR__ . '/../../views/dashboard/templates/error.php';
}



// Inclure les fichiers de l'interface utilisateur (header, formulaire d'ajout, footer)
include __DIR__ . '/../../views/dashboard/templates/dashboard_header.php';
include __DIR__ . '/../../views/dashboard/add_cocktail.php';
include __DIR__ . '/../../views/templates/footer.php';
