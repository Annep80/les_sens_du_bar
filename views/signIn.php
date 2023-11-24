<main>
    <form method="post" enctype="multipart/form-data"  class="container-fluid" >
        <div class="row text-center mt-5">
            <h1 class="connectTitle">Connexion</h1>
        </div>
        <div class="row text-center">
            <div class=" mt-5">
                <label class="col-10 col-md-4" for="mail">Adresse mail:*</label>
                <input class="col-md-4" type="mail" name="mail" class="mail" placeholder="Entrez votre adresse mail" required>
            </div>
            <span><?= isset($errors['mail']) ? $errors['mail'] : '' ?></span>
            <span><?= isset($errors['authentication']) ? $errors['authentication'] : '' ?></span>
        </div>
        <div class="row text-center ">
            <div class=" mt-5">
                <label class="col-10 col-md-4" for="password" class="password">Mot de passe:*</label>
                <input class="col-md-4" type="password" name="password" class="password" placeholder="Entrez votre mot de passe" required>
            </div>
            <span><?= isset($errors['password']) ? $errors['password'] : '' ?></span>
        </div>

        <div class="row">
            <button type="submit" class="btnSingIn col-4">Se connecter</button>
        </div>
        <span><?= isset($errors['user_login']) ? $errors['user_login'] : '' ?></span>
    </form>
    <div class="container-fluid">
        <div class="row text-center m-5">
            <div class=" linkSignUp">
                <p>Pas encore de compte?</p> <a class="link" href="/controllers/sign_up_ctrl.php">Accédez au formulaire d'inscription</a>
            </div>
        </div>
    </div>
</main>