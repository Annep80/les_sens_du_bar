<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Les sens du bar est un service de barman itinérant. Séminaires, inauguration, salon, mariages et autre évènements familliaux, votre barman itinérant saura sublimer tout type d'évenement grace à ses cocktails originaux.">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <link rel="stylesheet" href="/public/assets/css/style_dashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Finlandica&family=Satisfy&display=swap" rel="stylesheet">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
    <title>Les sens du bar</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-dark  sticky-top">
            <div class="w-100">
                <div class="row nav align-items-center justify-content-between">
                    
                    <div class="col-12 col-md-2 d-flex align-items-center justify-content-center">
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
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <a class="nav-link active" aria-current="page" href="/controllers/dashboard/dashboard_home_ctrl.php">Accueil dashboard</a>
                        <a class="nav-link active" aria-current="page" href="/controllers/home-ctrl.php">Accueil du site</a>

                        <h5 class="mt-5">Carrousel</h5>
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        
                            <li class="nav-item">
                                <a class="nav-link active" href="/controllers/dashboard/add_pictures_ctrl.php">Ajouter une image</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/controllers/dashboard/list_pictures_slider_ctrl.php">Liste des images </a>
                            </li>

                            
                        </ul>
                        <h5 class="mt-5">Cocktails</h5>
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/controllers/dashboard/add_cocktail_ctrl.php">Cocktails- ajouter un cocktail</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/controllers/dashboard/list_cocktail_ctrl.php">Cocktails- liste des cocktails</a>
                            </li>

                        </ul>
                        <h5 class="mt-5">Contact</h5>
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/controllers/dashboard/list_contact_ctrl.php">Liste des demandes</a>
                            </li>
                        </ul>
                        <h5 class="mt-5">Utilisateurs</h5>
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/controllers/dashboard/list_users_ctrl.php">Liste des utilisateurs</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>