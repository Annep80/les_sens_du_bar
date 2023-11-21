<main>

    <div class="container-fluid">
        <form class="" method="post" enctype="multipart/form-data" id="cocktailForm" >
            <div class="row ">
                <h1 class="mb-5 mt-5 col-md-12">Modifier le cocktail</h1>

                <div id="pictureContainer">
                    <label class="mt-5 col-md-5" for="pictures_name">Photo du cocktail: *</label>
                    <input  class="mt-5 col-md-4" type="file" name="pictures_name"  maxlenght="50" class="pictures_name" id="pictures_name">
                    <span id="error_picture" class="error-message"><?= $errors['picture'] ?? '' ?></span>
                </div>
                <div id="nameContainer">
                    <label class="mt-5 col-md-5" for="name">Nom du cocktail: *</label>
                    <input value="<?= $cocktails->name ?>" class="mt-5 col-md-4" pattern="<?= NAME_REGEX ?>" maxlenght="100" type="text" name="name" class="name" id="name" required>
                    <span id="error_name" class="error-message"><?= $errors['name'] ?? '' ?></span>
                </div>
                <div id="ingredientsContainer">
                    <label class="mt-5 col-md-5" for="ingredients">Ingrédient : *</label>
                    <textarea class="mt-5 col-md-4" type="texte" name="ingredients" pattern="<?= TEXTAREA_REGEX ?>" maxlenght="2000" class="ingredients" maxlength="1000" required><?= $cocktails->ingredients ?></textarea>
                    <span id="error_ingredient" class="error-message"><?= $errors['ingerdient'] ?? '' ?></span>
                </div>
                <div id="stageContainer">
                    <label class="mt-5 col-md-5" for="stages">Etape : *</label>
                    <textarea  class="mt-5 col-md-4" type="texte" name="stages" pattern="<?= TEXTAREA_REGEX ?>" maxlenght="2000" class="stages" required><?= $cocktails->stages ?></textarea>
                    <span id="error_stages" class="error-message"><?= $errors['stages'] ?? '' ?></span>
                </div>

                <div class="p-5 text-end">
                    <button type="submit" class="btn col-md-2 mt-3 btnForm">Enregistrer</button>
                </div>
            </div>
        </form>
    </div>


</main>
<script src="/public/assets/js/script_add_cocktail.js"></script>