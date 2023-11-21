<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Les sens du bar est un service de barman itinérant. Séminaires, inauguration, salon, mariages et autre évènements familliaux, votre barman itinérant saura sublimer tout type d'évenement grace à ses cocktails originaux.">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="/public/assets/img/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="/public/assets/img/favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Finlandica&family=Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
    <title>Les sens du bar</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-dark  sticky-top">
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


    <main class="container-fluid">
        <div class="row justify-content-center text-center">
            <h1 class="mb-5"> ERREUR 404 </h1>
            <img class="col-md-3 " src="/public/assets/img/404.png" alt="">
            <p class="trad404 mb-5">* Ce n'est pas la page que vous recherchez.</p>
        </div>
    </main>


    <!-- Footer -->
    <footer class=" text-center ">
        <!-- Grid container -->
        <div class="container p-4">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/les.sens.du.bar" target="blank" role="button"><img src="/public/assets/img/icons8-facebook-50 (1).png" alt="logo facebook"></a>

                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com/les.sens.du.bar/?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA==" target="blank" role="button"><img src="/public/assets/img/icons8-instagram-old-50.png" alt="logo instagram"></a>

                <!-- Linkedin -->
                <a class="btn btn-outline-light btn-floating m-1" href="https://www.linkedin.com/in/annepiau/" role="button"><img src="/public/assets/img/icons8-linkedin-50 (1).png" alt="logo linkedin"></a>

                <!-- Github -->
                <!-- <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-github"></i></a> -->
            </section>
            <!-- Section: Social media -->
            <!-- Section: Links -->
            <section class="">
                <!--Grid row-->
                <div class="row justify-content-center ">
                    <!--Grid column-->
                    <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="/controllers/contact_page_ctrl.php" class="">Contact</a>
                            </li>
                            <li>
                                <a href="/controllers/legal_ctrl.php" class="">Mentions légales</a>
                            </li>
                            <li>
                                <a href="/controllers/signIn-ctrl.php" class="">Espace personnel</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </section>
            <!-- Section: Links -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3">
            L'abus d'alcool est dangereux pour la santé, à consommer avec modération. © 2023 Copyright: Anne Piau
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- <script src="/public/assets/js/script.js"></script> -->
</body>

</html>