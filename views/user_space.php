<main>
    <div class="container-fluid">
        <div class="row justify-content-end">
            <h4>
                <a href="/controllers/sign_out_ctrl.php"><img src="/public/assets/img/close.png" alt="croix deconnexion">
                    Deconnexion
                </a>
            </h4>
        </div>
        <div class="container-fluid">

            <div class="row text-center">
                <h2 class="welcomeTitle">Bienvenue <?= $_SESSION['users_register']['firstname'] ?> !</h2>
            </div>

            <form method="post" enctype="multipart/form-data" class="row personalInfo justify-content-center">

                <h3 class="text-center mt-5">Mes informations personnelles</h3>

                <div class="mt-5 col-md-5">
                    <label for="lastname">Nom: *</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" maxlength="30" autocomplete="familly-name" value="<?= $userArray['lastname'] ?>">
                </div>
                <div class="mt-5 col-md-5">
                    <label for="firstname">Prénom: *</label>
                    <input class="form-control " id="firstname" name="firstname" type="text" maxlength="30" autocomplete="given-name" required value="<?= $userArray['firstname'] ?>">
                </div>
                <div class="mt-5 col-md-5">
                    <label for="phone">Téléphone: *</label>
                    <input class="form-control " id="phone" name="phone" type="tel" maxlength=" 10" autocomplete="given-name" required value="<?= $userArray['phone'] ?>">
                </div>
                <div class="mail mt-5 col-md-5">
                    <label class="" for="mail">E-mail: *</label>
                    <input class="form-control " id="mail" name="mail" type="email" autocomplete="email" required value="<?= $userArray['mail'] ?>">
                </div>
                <div class="mt-5 col-md-10">
                    <label for="address">Rue:</label>
                    <input class="form-control " id="address" name="address" type="text" value="<?= $userArray['address'] ?>">
                    <label class="" for="zipcode">Code postal:</label>
                    <input class="form-control " id="zipcode" name="zipcode" type="text" value="<?= $userArray['zipcode'] ?>">
                    <label for="city">Ville:</label>
                    <input class="form-control " id="city" name="city" type="text" value="<?= $userArray['city'] ?>">
                </div>
                <a class="updateBtn btn col-md-4 mt-5" href="/controllers/user_space_ctrl.php?action=update&id_user=<?= $userArray['id_users'] ?>">Modifier</a>
            </form>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center ">
                <h3 class="text-center mt-5">Mes devis</h3>
                <div class="col-md-10">
                    <a href="">Devis_13032022</a>
                </div>
                <div class="col-md-10">
                    <a href="">Devis_11122022</a>
                </div>
                <div class="col-md-10">
                    <a href="">Devis_24112023</a>
                </div>
            </div>
        </div>
</main>