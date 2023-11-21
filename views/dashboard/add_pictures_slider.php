<main>
    <div class="container-fluid">

        <div class="row text-center">
        <a class=" m-5 col-md-1" href="/controllers/dashboard/dashboard_home_ctrl.php"><img src="/public/assets/img/retourJaune.png" alt="boutton retour"></a>
            
            <h1 class="mt-5">Ajout d'images au carrousel</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <label class="col-md-5 mt-5" for="pictures_name">Votre image:</label>
                <input class="col-6 m-2" type="file" id="pictures_name" name="pictures_name" accept=".jpg, .png, .gif" required>
                <button type="submit" class="btn col-md-3 mt-5 mb-5">ajouter</button>
                <span id="error_picture" class="error-message text-danger col-md-10"><?= $errors['slider'] ?? '' ?></span>
                <span id="success_message" class="success-message col-md-12 text-success "><?= $message ?? '' ?></span>
            </form>
        </div>
    </div>
</main>