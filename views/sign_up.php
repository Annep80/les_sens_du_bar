<main>

    <div class="container-fluid">

        <form method="post" enctype="multipart/form-data" action="" class="row personalInfo justify-content-center">
            <h3 class="text-center">Formulaire d'inscription</h3>
            <div class="mt-5 col-12 col-md-5">
                <label for="lastname">Nom: *</label>
                <input type="text" class="form-control" id="lastname" name="lastname" maxlength="30" pattern="<?= LASTNAME_REGEX ?>" autocomplete="familly-name">
                <span class=" alert-danger"><?= $errors['lastname'] ?? '' ?></span>
            </div>
            <div class="mt-5 col-12 col-md-5">
                <label for="firstname">Prénom: *</label>
                <input class="form-control " id="firstname" name="firstname" type="text" maxlength="30" pattern="<?= FIRSTNAME_REGEX ?>" autocomplete="given-name"  required>
                <span class=" alert-danger"><?= $errors['firstname'] ?? '' ?></span>
            </div>

            <div class="mt-5 col-12 col-md-5">
                <label for="birthday">Date de naissance: *</label>
                <input class="form-control " id="birthday" name="birthday" type="date" maxlength="30" max="2006-01-01" required>
                <span class=" alert-danger"><?= $errors['birthday'] ?? '' ?></span>
            </div>


            <div class="mt-5 col-12 col-md-5">
                <label for="phoneNumber">Téléphone: *</label>
                <input class="form-control " id="phoneNumber" name="tel" type="tel" maxlength=" 10"  autocomplete="given-name"  required>
                <span class=" alert-danger"><?= $errors['phone'] ?? '' ?></span>
            </div>

            <div class="mail mt-5 col-12 col-md-10">
                <label class="" for="mailInfo">E-mail: *</label>
                <input class="form-control " id="mailInfo" name="mail" type="email" pattern="<?= EMAIL_REGEX ?>" autocomplete="email" required>
                <span class=" alert-danger"><?= $errors['email'] ?? '' ?></span>
            </div>

            <div class="mt-5 col-12 col-md-10">
                <div class="mb-5">
                    <label for="adress">Rue:</label>
                    <input class="form-control" id="address" name="address"  type="text">
                    <span class=" alert-danger "><?= $errors['address'] ?? '' ?></span>
                </div>
                <div class="input-group">
                    <label class="cities input-group-text">Code postal</label>
                    <input class="form-control form-control-lg" maxlength="5" type="text"  pattern="<?= ZIPCODE_REGEX ?>" name="zipcode" id="zipcode">

                    <select class=" form-select form-select-lg" name="city" id="city">
                        <option selected>Ville</option>
                    </select>
                </div>
                <span class=" alert-danger"><?= $errors['zipcode'] ?? '' ?></span>
            </div>
            <div class="password  mt-5 col-12 col-md-10">
                <div class="mb-2 ">
                    
                    <label class="" for="password">Mot de passe: *</label>
                    <input class="form-control"  id="password" name="password" pattern="<?= PASSWORD_REGEX ?>" type="password"  required>
                    <span class=" alert-danger"><?= $errors['password'] ?? '' ?></span>
                    <p class="text-danger">Votre mot de passe doit comporter au moins 14 caractères 1 majuscule, 1 minuscule, 1 chiffre et 1 caractère spécial.</p>
                </div>

                <label for="passwordVerify">Confirmation mot de passe: *</label>
                <input class="form-control " type="password"  id="passwordVerify" pattern="<?= PASSWORD_REGEX ?>" name="passwordVerify"  required>
                <span class=" alert-danger"><?= $errors['password'] ?? '' ?></span>

            </div>

            <div id="validationMessage"><?= $message ?? '' ?></div>
            <div class="col-6 col-md-4 mb-5">
                <button type="submit" class="btn btnSingIn btnForm">S'inscrire</button>
            </div>

        </form>
    </div>
</main>
<!-- <script src="/public/assets/js/signUp_script.js"></script> -->
<script src="/public/assets/js/scriptCities.js"></script>