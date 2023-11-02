


    <main class="container-fluid">
            <img src="./public/assets/img/cocktail-fond.png" id="cocktailBackground" alt="">
            <form class="row personalInfo justify-content-evenly">
                <h3>Informations personnelles</h3>
                <div class="mt-5 col-5">
                    <label for="lastname">Nom: *</label>
                    <input class="form-control " id="lastname" name="lastname" type="text" pattern="<?= REGEX_NAME ?>" maxlength="30" autocomplete="familly-name" placeholder="Entrez votre nom" required>
                </div>
                <div class="mt-5 col-5">
                    <label for="firstname">Prénom: *</label>
                    <input class="form-control " id="firstname" name="firstname" type="text" pattern="<?= REGEX_NAME ?>" maxlength="30" autocomplete="given-name" placeholder="Entrez votre prénom" required>
                </div>
                <div class="mt-5 col-5">
                    <label for="phoneNumber">Téléphone: *</label>
                    <input class="form-control " id="phoneNumber" name="tel" type="text" pattern="<?= REGEX_NUMBERPHONE ?>" maxlength="10" autocomplete="given-name" placeholder="Entrez votre prénom" required>
                </div>
                <div class="mail mt-5 col-5">
                    <label class="" for="mailInfo">E-mail: *</label>
                    <input class="form-control " id="mailInfo" pattern="<?= REGEX_MAIL ?>" name="mail" type="email" placeholder="Entrez votre e-mail" autocomplete="email" required>
                </div>
                <div class="mt-5 col-5">
                    <label for="adress">Rue:</label>
                    <input class="form-control " id="adress" name="adress" type="text">
                    <label class="" for="postalData">Code postal:</label>
                    <input class="form-control " id="postalData" name="postal" type="text" pattern="<?= REGEX_POSTAL ?>" placeholder="80000">
                    <label for="city">Ville:</label>
                    <input class="form-control " id="city" name="city" type="text">
                </div>
                
                <div class="password  mt-5 col-8">
                    <label class="" for="password">Mot de passe: *</label>
                    <input class="form-control " id="password" name="password" pattern="<?= REGEX_PASSWORD ?>" type="password" placeholder="Entrez votre mot de passe" required>
                    <label for="passwordVerify">Confirmation mot de passe: *</label>
                    <input class="form-control " type="password" id="passwordVerify" name="passwordVerify" pattern="<?= REGEX_PASSWORD ?>" placeholder="Entrez votre mot de passe" required>
                </div>
            </form>
        </main>
        