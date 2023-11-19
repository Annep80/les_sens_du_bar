<main>
    <?php
    FlashMessage::display();
    ?>
    <div class="container-fluid">
        <div class="row text-center">
            <h1>Liste des cocktails </h1>
            <a href="/controllers/dashboard/add_cocktail_ctrl.php">ajouter un cocktail</a>

        </div>
        <!-- On tables -->
        <div class="row justify-content-center m-5">
            <table>
                <thead>
                    <tr>
                        <th class="col-md-2 ">Photo</th>
                        <th class="col-md-2 ">Nom</th>
                        <th class="col-md-3 ">Ingrédients</th>
                        <th class="col-md-3  ">Etapes</th>
                        <th class="col-md-1 ">Modifier</th>
                        <th class="col-md-1 ">Supprimer</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($cocktails as $cocktail) { ?>
                        <tr>

                            <td class="col-md-2"><img class="col-md-8" src="/public/uploads/cocktail/<?= $cocktail->pictures_name ?>" alt=""></td>
                            <td class="col-md-2"><?= $cocktail->name ?></td>
                            <td class="col-md-3" ><?= $cocktail->ingredients ?></td>
                            <td class="col-md-3"><?= $cocktail->stages ?></td>
                            <td class="col-md-2"><a class="updateBtn btn" href="/controllers/dashboard/update_cocktail_ctrl.php?action=update&id_cocktail=<?= $cocktail->id_cocktail ?>"><img src="/public/assets/img/update.png" alt="boutton update"></a></td>
                            <td class="col-md-2"><a class="deleteBtn btn" href="/controllers/dashboard/list_cocktail_ctrl.php?action=delete&id_cocktail=<?= $cocktail->id_cocktail ?>"><img src="/public/assets/img/corbeille.png" alt="boutton supprimer"></a></td>
                        </tr><?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- <h3>Cocktails archivés</h3>
    <div class="row justify-content-center m-5">
            <table>
                <thead>
                    <tr>
                        <th class="col-md-2">Photo</th>
                        <th class="col-md-2">Nom</th>
                        <th class="col-md-3">Ingrédients</th>
                        <th class="col-md-3 ">Etapes</th>
                        <th class="col-md-2">Supprimer</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($archived as $archivedCocktail) { ?>
                        <tr>
                            
                            <td class="col-md-2"><img class="col-md-8" src="/public/uploads/cocktail/<?= $archivedCocktail->pictures_name ?>" alt=""></td>
                            <td class="col-md-2"><?= $archivedCocktail->name ?></td>
                            <td class="col-md-3"><?= $archivedCocktail->ingredients ?></td>
                            <td class="col-md-3"><?= $archivedCocktail->stages ?></td>
                            <td class="col-md-2"><a class="deleteBtn btn" href="/controllers/dashboard/list_cocktail_ctrl.php?action=delete&id_cocktail=<?= $archivedCocktail->id_cocktail ?>"><img src="/public/assets/img/corbeille.png" alt="boutton restorer"></a></td>
                            <td class="col-md-2"><a class="deleteBtn btn" href="/controllers/dashboard/list_cocktail_ctrl.php?action=delete&id_cocktail=<?= $archivedCocktail->id_cocktail ?>"><img src="/public/assets/img/corbeille.png" alt="boutton supprimer"></a></td>
                        </tr><?php } ?>
                </tbody>
            </table>
        </div>
    </div> -->
</main>