<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $metaDescription ?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="/public/assets/img/favicon.png" />


    <link href="https://fonts.googleapis.com/css2?family=Finlandica&family=Satisfy&display=swap" rel="stylesheet">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
    <title><?= $title ?></title>
</head>

<body>
    <header>
        <nav class="navbar navbar-dark  sticky-top">
            <div class="w-100">
                <div class="row nav align-items-center justify-content-between">
                    
                    <div class="col-12 col-md-2  d-flex align-items-center justify-content-center">
                        <a href="/controllers/home-ctrl.php">
                            <img src="/public/assets/img/logo_les_sens_du_bar.png" alt="logo les sens du bar">
                        </a>
                    </div>
                    <div class="col-12 col-md-1 d-flex align-items-center justify-content-center">
                        <button class="navbar-toggler border-0 " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                            <img  class="ms-4" src="/public/assets/img/icons8-menu-30.png"  alt="menu hamburger">
                        </button>
                    </div>
                </div>
                <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header">
                        <button type="button" class=" btnClose " data-bs-dismiss="offcanvas" aria-label="Close"><img src="/public/assets/img/close.png" alt=""></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active <?= (isset($_SESSION['users_register']) ? 'd-block' : 'd-none') ?>" href="/controllers/user_space_ctrl.php">Mon compte</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active   <?= (isset($_SESSION['users_register']) ? 'd-none' : 'd-block') ?>" aria-current="page" href="/controllers/signIn-ctrl.php">S'inscrire / Connexion</a>
                            </li>
                            <?php
                            // Vérifiez si l'utilisateur est connecté
                            if (isset($_SESSION['users_register'])) {
                                // Vérifiez le rôle de l'utilisateur (supposons que le rôle est stocké dans la clé 'id_role')
                                $userRole = $_SESSION['users_register']['id_roles'];

                                // Affichez le bouton Dashboard si le rôle est égal à 1
                                if ($userRole == 1) { ?>
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="/controllers/dashboard/dashboard_home_ctrl.php">Dashboard</a>
                                    </li>
                            <?php
                            ;
                                }
                            }
                            ?>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/controllers/cocktail-ctrl.php">Cocktails du mois</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/controllers/contact_page_ctrl.php">Nous contacter</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>