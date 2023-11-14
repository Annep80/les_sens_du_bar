<main>

    <div class="container-fluid">
        <div class="signUpStyle">
            <!-- <div id="cocktailBackground">
                <img src="/public/assets/img/cocktail-fond.png" id="cocktailBackground" alt="cocktail">
            </div> -->
        </div>

        <form method="post" enctype="multipart/form-data" action="" class="row personalInfo justify-content-center">
            <h3 class="text-center">Formulaire d'inscription</h3>
            <div class="mt-5 col-12 col-md-5">
                <label for="lastname">Nom: *</label>
                <input type="text" class="form-control" id="lastname" name="lastname" maxlength="30" autocomplete="familly-name">
            </div>
            <div class="mt-5 col-12 col-md-5">
                <label for="firstname">Prénom: *</label>
                <input class="form-control " id="firstname" name="firstname" type="text" maxlength="30" autocomplete="given-name" placeholder="Entrez votre prénom" require>
            </div>

            <div class="mt-5 col-12 col-md-5">
                <label for="birthday">Date de naissance: *</label>
                <input class="form-control " id="birthday" name="birthday" type="date" maxlength="30" max="2006-01-01" require>
            </div>


            <div class="mt-5 col-12 col-md-5">
                <label for="phoneNumber">Téléphone: *</label>
                <input class="form-control " id="phoneNumber" name="tel" type="tel" maxlength=" 10" autocomplete="given-name" placeholder="Entrez votre prénom" require>
            </div>
            <div class="mail mt-5 col-12 col-md-10">
                <label class="" for="mailInfo">E-mail: *</label>
                <input class="form-control " id="mailInfo" name="mail" type="email" placeholder="Entrez votre e-mail" autocomplete="email" require>
            </div>

            <div class="mt-5 col-12 col-md-10">
                <label for="adress">Rue:</label>
                <input class="form-control mb-5" id="adress" name="adress" type="text">

                <div class="input-group">
                    <label class="cities input-group-text">Code postal</label>
                    <input class="form-control form-control-lg" maxlength="5" type="text" placeholder="Entrez un code postal" name="zipcode" id="zipcode">
                    <select class=" form-select form-select-lg" name="city" id="city">
                        <option selected>Ville</option>
                    </select>
                </div>
            </div>
            <div class="password  mt-5 col-12 col-md-10">
                <label class="" for="password">Mot de passe: *</label>
                <input class="form-control mb-5" id="password" name="password" type="password" placeholder="Entrez votre mot de passe" require>
                <label for="passwordVerify">Confirmation mot de passe: *</label>
                <input class="form-control " type="password" id="passwordVerify" name="passwordVerify" placeholder="Entrez votre mot de passe" require>
            </div>

            <div id="validationMessage"></div>

            <button type="submit" class="btn btnSingIn btnForm col-6 col-md-4 mb-5">S'inscrire</button>
        </form>
    </div>
</main>
<!-- <script src="/public/assets/js/signUp_script.js"></script> -->
<script src="/public/assets/js/scriptCities.js"></script>