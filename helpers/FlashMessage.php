<?php

class FlashMessage
{
    // Méthode pour définir un message flash
    public static function set(string $message, int $type = SUCCESS)
    {
        // Création d'un objet stdClass pour stocker le message et son type
        $flashMessage = new stdClass;
        $flashMessage->message = $message;
        $flashMessage->type = $type;
        // Stockage de l'objet dans la session
        $_SESSION["flashMessage"] = $flashMessage;
    }
    // Méthode pour afficher le message flash
    public static function display()
    {
        // Vérifier si un message flash est présent dans la session
        if (isset($_SESSION['flashMessage'])) {
            // Sélectionner la classe CSS en fonction du type de message
            switch ($_SESSION['flashMessage']->type) {
                case ERROR:
                    $className = 'alert-danger';
                    break;
                case SUCCESS:
                    $className = 'alert-success';
                    break;
            }
            // Afficher le message flash avec la classe CSS appropriée
            echo '<div class="alert ' . $className . '">' . $_SESSION['flashMessage']->message . '</div>';
            // Supprimer le message flash de la session pour qu'il ne soit pas affiché à nouveau
            unset($_SESSION['flashMessage']);
        }
    }
}
