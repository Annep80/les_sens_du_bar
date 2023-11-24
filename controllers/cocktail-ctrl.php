<?php
// Inclure le fichier contenant la définition de la classe Cocktail
require_once __DIR__ . '/../models/Cocktail.php';
$title = 'Cocktail du mois - les sens du bar';
$metaDescription = 'Les sens du bar est un service de barman itinérant. Retrouvez nos suggestions mensuelles de cocktails.';
// Démarrer la session
session_start();
// Récupérer la liste de tous les cocktails en appelant la méthode statique getAll de la classe Cocktail
$cocktails = Cocktail::getAll();

include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/cocktail.php';
include __DIR__ . '/../views/templates/footer.php';
