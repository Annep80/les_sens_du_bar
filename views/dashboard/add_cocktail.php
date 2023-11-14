<main>
    <div class="container-fluid">
        <form class="" method="post" enctype="multipart/form-data" id="cocktailForm" novalidate>
            <div class="row ">
                <h1 class="mb-5 mt-5 col-md-12">Ajouter un cocktail</h1>

                <h3 class="col-md-12">Ajouter une photo</h3>
                <div id="pictureContainer">
                    <label class="mt-5 col-md-5" for="cocktails_pictures_name">Photo du cocktail: *</label>
                    <input class="mt-5 col-md-4" type="file" name="cocktails_pictures_name" class="cocktails_pictures_name" id="cocktails_pictures_name" require>
                </div>
                <div id="nameContainer">
                    <label class="mt-5 col-md-5" for="cocktail_name">Nom du cocktail: *</label>
                    <input class="mt-5 col-md-4" type="text" name="cocktail_name" class="cocktail_name" id="cocktail_name" require>
                </div>
                <h3 class="mt-5 col-md-12">Ajouter un ingrédient</h3>
                <div id="ingredientsContainer">
                    <label class="mt-5 col-md-5" for="ingredient">Ingrédient : *</label>
                    <input class="mt-5 col-md-4" type="texte" name="ingredient" class="ingredient" require>
                </div>
                <div class="p-5 text-end">
                    <button type="button" class="btn btnForm col-md-2 mt-3" onclick="addIngredient()">Ajouter un ingrédient</button>
                </div>
                <h3 class="mt-5 col-md-12">Ajouter une étape</h3>
                <div id="stageContainer">
                    <label class="mt-5 col-md-5" for="stage">Etape : *</label>
                    <input class="mt-5 col-md-4" type="texte" name="stage" class="stage" require>
                </div>
                <div class="p-5 text-end">
                    <button type="button" class="btn btnForm col-md-2 mt-3 " onclick="addStage()">Ajouter une étape</button>
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