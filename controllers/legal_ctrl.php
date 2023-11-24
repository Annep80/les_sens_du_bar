<?php
// Démarrer la session
session_start();
$title = 'Mentions légales - les sens du bar';
$metaDescription = 'Les sens du bar est un service de barman itinérant.
                    Avec les sens du bar, bénéficiezdes services d\'un barman à domicile. 
                    Consultez nos mentions légales.';

include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/legal.php';
include __DIR__ . '/../views/templates/footer.php';
