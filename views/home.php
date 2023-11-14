<!-- présentation -->
<main class="container-fluid">
    <div class="row WhoIAm">
        <img class="emilienBar p-0 img-fluid" src="/public/assets/img/Emilien.png" alt="Les sens du bar">
    </div>

    <div class="row justify-content-center">
        <h2 class="textVertical col-md-2 col-2 mt-5">VOTRE BARMAN</h2>
        <div class="textDescription col-md-8 col-8 ">
            <h2 class="emilien ">Emilien</h2>
            <h3 class=" ">Diplômé de l'European Bartender School</h3>
            <h4 class=" ">Les Sens du Bar, l'histoire d'une passion!</h4>
            <p class=" ">Sourire, courage, créativité, sens du service sont les ingrédients
                nécessaires pour réussir derrière un bar. Après plusieurs expériences en
                hôtellerie, restauration et au fil des rencontres, j'ai voulu me tourner vers la prestation
                événementielle pour régaler les yeux et les papilles Faire plaisir, créer des souvenirs, marquer
                les
                esprits d'une rencontre familiale ou d'un événement professionnel sont des réelles motivations
                au
                quotidien et un formidable moteur pour continuer de me perfectionner et d'évoluer.
                Ma philosophie : je ne fais pas des boissons mais j'invente des moments de rêve et de détente !
            </p>
        </div>
        <p class="cote col-md-10 text-center">Alors, vous prendrez bien un dernier verre ?</p>
    </div>
</main>
<!-- fin présentation -->
<!-- caroussel alimenté par la base de données -->
<div class="container-fluid">
    <div class="row justify-content-evenly">
        <div class="col-md-8">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-touch="false">
                <div class="carousel-inner">

                    <?php foreach ($sliderPictures as $key => $sliderPicture) { ?>
                        <div class="carousel-item <?php echo ($key === 0) ? 'active' : ''; ?>">
                            <img src="/public/uploads/slider/<?= $sliderPicture->pictures_name ?>" class="d-block w-100" alt="...">
                        </div>
                    <?php } ?>

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <button type="button" class="requestEstimate col-md-4" onclick="window.location.href='/controllers/devis_ctrl.php';">demander un devis</button>
</div>



<!-- fin caroussel -->
<!-- cards cocktail -->
<section class="container-fluid">
    <div class="row justify-content-evenly">
        <div class="cardCocktail col-md-4" style="width: 18rem;">
            <img src="/public/assets/img/spritz.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Spritz</h5>
                <p class="card-text">C’est enfin Juin ! Et qui dit été qui approche, dit Spritz ! Cette boisson
                    typiquement italienne est l'arme secrète de tout barman pour rafraîchir les longues soirées
                    d'été.</p>
            </div>
        </div>
        <div class="cardCocktail col-md-4" style="width: 18rem;">
            <img src="/public/assets/img/maï_taï.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Maï taï</h5>
                <p class="card-text">Qui dit mois de mai, dit évidemment Maï Taï !
                    Avec ses saveurs exotiques de rhum, de jus de citron vert, de sirop d'orgeat et de triple sec,
                    le Maï Taï est le cocktail parfait pour vous sentir en vacances.
            </div>
        </div>
        <div class="cardCocktail col-md-4" style="width: 18rem;">
            <img src="/public/assets/img/bunny_Mary.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Bunny mary</h5>
                <p class="card-text">Et si vous surpreniez vos invités avec un cocktail à la fois ludique, savoureux
                    et de saison ? Inspiré du Bloody Mary, le Bunny Mary offre une variante à la carotte
                    parfaitement d’actualité pour un brunch ou un repas de Pâques.</p>
            </div>
        </div>
    </div>
    <button type="button" class=" btn cocktailPage col-md-4" onclick="window.location.href='/controllers/cocktail-ctrl.php';">cocktails du mois</button>
</section>
<!-- fin cards cocktail -->
<!-- disponibilités et contact -->
<section class="container-fluid">
    <div class="row justify-content-evenly">

    </div>


    <form id="contactForm" class="contactForm row justify-content-evenly mb-5 ">
        <h4 class="titleContact text-center">Contacter Emilien:</h4>
        <label class="col-md-7 col-10" for="lastname">Nom: *</label>
        <input class=" inputForm col-md-7 col-10" id="lastname" type="text" placeholder="Nom" required>
        <label class="inputForm col-md-7 col-10" for="firstname">Prénom: *</label>
        <input class="inputForm col-md-7 col-10" id="firstname" type="text" placeholder="Prénom" required>
        <label class="inputForm col-md-7 col-10" for="phoneNumber">Numéro de téléphone: *</label>
        <input class="inputForm col-md-7 col-10" id="phoneNumber" type="tel" placeholder="Numéro de téléphone" required>
        <label class="inputForm col-md-7 col-10" for="mail">Adresse mail: *</label>
        <input class="inputForm col-md-7 col-10" id="mail" type="email" placeholder="Adresse mail" required>
        <label class="inputForm col-md-7 col-10" for="demande">Votre demande: *</label>
        <textarea class="message col-md-7 col-10" id="demande" placeholder="Votre message" required></textarea>
        <div class="rgpdValidation text-center ">
            <input class="me-2" id="textRgpd" type="checkbox">
            <label class="textRgpd" for="textRgpd">J'autorise Les sens du bar à conserver mes données personnelles
                transmises via ce formulaire. </label>
        </div>
        <button type="submit" class="submitForm col-md-4 col-4">Envoyer</button>
    </form>
</section>
<section class="container-fluid">
    <div class="contactDetails row">
        <h3 class="contact col-md-12">Coordonnés:</h3>
        <p class="owner col-md-12">Emilien Baudoin</p>
        <p class="phoneNumber col-md-12">06.88.44.82.73</p>
        <p class="mailContact col-md-12">contact@sensdubar.fr</p>

    </div>
</section>
<!-- fin disponibilité et contact -->

<!-- références -->
<section class="container-fluid mb-5">
    <div class="row text-center">
        <h3 class="partnerTitle col-md-12">Ils nous ont fait confiance:</h3>
    </div>
    <div class="row justify-content-center">
        <img class="imgPartner col-md-2 col-8" src="/public/assets/img/audi_fond_blanc.png" alt="logo Audi">
        <img class="imgPartner col-md-2 col-8" src="/public/assets/img/cgpme.png" alt="logo cgpme">
    </div>
    <div class="row justify-content-center">
        <img class="imgPartner col-md-2 col-8" src="/public/assets/img/club_proteine.jpeg" alt="logo club proteine">
        <img class="imgPartner col-md-2 col-8" src="/public/assets/img/carlier_baudoin.png" alt="logo carlier baudoin">
    </div>
</section>
<!-- fin références -->