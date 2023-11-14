<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Les sens du bar est un service de barman itinérant. Séminaires, inauguration, salon, mariages et autre évènements familliaux, votre barman itinérant saura sublimer tout type d'évenement grace à ses cocktails originaux.">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="/public/assets/img/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="/public/assets/img/favicon.png" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css2?family=Finlandica&family=Satisfy&display=swap" rel="stylesheet">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
    <title>Les sens du bar</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-dark bg-dark sticky-top">
            <div class="container-fluid">
                <div class="row nav justify-content-evenly">
                    <a class="col-md-2 col-7" href="/controllers/home-ctrl.php"><img src="/public/assets/img/logo_les_sens_du_bar.png" alt="logo les sens du bar"></a>

                    <button class="navbar-toggler col-md-2 col-10 border border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                        <img src="/public/assets/img/menu-hamburger.png" alt="menu hamburger">
                    </button>
                </div>
                <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" href="/controllers/user_space_ctrl.php">Mon compte</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/controllers/signIn-ctrl.php">S'inscrire / Connexion</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/controllers/dashboard/dashboard_home_ctrl.php">dashboard</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>