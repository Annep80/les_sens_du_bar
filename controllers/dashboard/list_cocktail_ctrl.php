<?php
// Inclure les fichiers nécessaires
require_once __DIR__ . ('/../../models/Cocktail.php');
require_once __DIR__ . ('/../../helpers/FlashMessage.php');
require_once __DIR__ . ('/../../config/const.php');



// Démarrer la session
session_start();
// Vérifier si l'utilisateur a le rôle requis (rôle avec l'identifiant 1) pour accéder
if ($_SESSION['users_register']['id_roles'] != 1) {
    // Rediriger vers la page d'accueil si l'utilisateur n'a pas le rôle requis
    header('location: /../../controllers/home-ctrl.php');
}

try {
    // Récupérer la liste de tous les cocktails
    $cocktails = Cocktail::getAll();
    // Récupérer l'ID du cocktail à partir des données GET et le convertir en entier
    $id_cocktail = intval(filter_input(INPUT_GET, 'id_cocktail', FILTER_SANITIZE_NUMBER_INT));
    // Récupérer l'action à effectuer à partir des données GET
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
    // Récupérer le paramètre "delete" des données GET
    $delete = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_SPECIAL_CHARS);
    // Récupérer le paramètre "update" des données GET
    $update = filter_input(INPUT_GET, 'update', FILTER_SANITIZE_SPECIAL_CHARS);


    switch ($action) {

        case 'delete':
            // Supprimer le cocktail avec l'ID spécifié
            $isDeleted = (int)Cocktail::delete($id_cocktail);
            if (!$cocktails) {
                // Afficher un message d'erreur si le cocktail n'existe pas
                FlashMessage::set('Le cocktail n\'existe pas!', ERROR);
                break;
            }
            if ($isDeleted) {
                // Supprimer le fichier associé au cocktail du répertoire d'uploads
                @unlink(__DIR__ . '/public/uploads/cocktail/' . $cocktail->pictures_name);
                // Afficher un message de succès si la suppression a réussi
                FlashMessage::set('La suppression s\'est bien déroulée!', SUCCESS);
            } else {
                // Afficher un message d'erreur si la suppression a échoué
                FlashMessage::set('La suppression n\'a pas été effectuée', ERROR);
            }
            // Rediriger vers la liste des cocktails avec le paramètre "delete"
            header('location: /controllers/dashboard/list_cocktail_ctrl.php?delete=' . $isDeleted);

            break;
        default:
            // Aucune action spécifiée
            break;
    }
} catch (\Throwable $th) {
    // Gérer les erreurs générales
    $error = $th->getMessage();

    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    die;
}


// Inclure les fichiers de l'interface utilisateur (header, liste des cocktails, footer)
include __DIR__ . '/../../views/dashboard/templates/dashboard_header.php';
include __DIR__ . '/../../views/dashboard/list_cocktail.php';
include __DIR__ . '/../../views/templates/footer.php';
