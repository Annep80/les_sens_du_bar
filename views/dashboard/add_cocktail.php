<main>
    <div class="container-fluid">
        <form class="" method="post" enctype="multipart/form-data" id="cocktailForm" novalidate>
            <div class="row ">
                <h1 class="mb-5 mt-5 col-md-12">Ajouter un cocktail</h1>
                <span id="success_create" class="success-message form-text text-success mb-5 "><?= $message ?? '' ?></span>
                <h3 class="col-md-12">Ajouter une photo</h3>
                <div id="pictureContainer">
                    <label class="mt-5 col-md-5" for="pictures_name">Photo du cocktail: *</label>
                    <input class="mt-5 col-md-4" type="file" name="pictures_name" class="pictures_name" id="pictures_name" required>
                    <span id="error_picture" class="error-message form-text text-danger"><?= $errors['picture'] ?? '' ?></span>
                </div>
                <div id="nameContainer">
                    <label class="mt-5 col-md-5" for="name">Nom du cocktail: *</label>
                    <input class="mt-5 col-md-4" type="text" name="name" class="name" id="name" required>
                    <span id="error_name" class="error-message form-text text-danger"><?= $errors['name'] ?? '' ?></span>
                </div>
                <h3 class="mt-5 col-md-12">Ajouter un ingrédient</h3>
                <div id="ingredientsContainer">
                    <label class="mt-5 col-md-5" for="ingredients">Ingrédient : *</label>
                    <textarea class="mt-5 col-md-4" type="texte" name="ingredients" class="ingredients" maxlength="1000" required></textarea>
                    <span id="error_ingredient" class="error-message form-text text-danger"><?= $errors['ingerdient'] ?? '' ?></span>
                </div>

                <h3 class="mt-5 col-md-12">Ajouter une étape</h3>
                <div id="stageContainer">
                    <label class="mt-5 col-md-5" for="stages">Etape : *</label>
                    <textarea class="mt-5 col-md-4" type="texte" name="stages" class="stages" required></textarea>
                    <span id="error_stages" class="error-message form-text text-danger"><?= $errors['stages'] ?? '' ?></span>
                </div>

                <div id="validationMessage" class="validationMessage mt-3"></div>
                <div class="p-5 text-end">
                
                    <button type="submit" class="btn col-md-2 mt-3 btnForm">Enregistrer</button>
                </div>
            </div>
        </form>
    </div>


</main>
<script src="/public/assets/js/script_add_cocktail.js"></script>