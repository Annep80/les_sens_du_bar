<?php

require_once __DIR__ . '/../models/Cocktail.php';

$cocktails = Cocktail::getAll();

include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/cocktail.php';
include __DIR__ . '/../views/templates/footer.php';
