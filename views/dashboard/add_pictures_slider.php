<main>
    <div class="container-fluid">

        <div class="row text-center">
            <h1 class="mt-5">Ajout d'images au carrousel</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <label class="col-md-5 mt-5" for="pictures_name">Votre image:</label>
                <input class="col-6 m-2" type="file" id="pictures_name" name="pictures_name" accept=".jpg, .png, .gif">
                <button type="submit" class="btn col-md-3 mt-5">ajouter</button>
                <span id="error_picture" class="error-message"><?= $errors['slider'] ?? '' ?></span>
            </form>
        </div>
    </div>
</main>