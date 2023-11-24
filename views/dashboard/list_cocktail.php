<main>

    <div class="container-fluid">
        <div class="row text-center">
            <a class=" m-5 col-md-1" href="/controllers/dashboard/dashboard_home_ctrl.php"><img src="/public/assets/img/retourJaune.png" alt="boutton retour"></a>

            <h1>Liste des cocktails </h1>
            <a href="/controllers/dashboard/add_cocktail_ctrl.php">ajouter un cocktail</a>

        </div>

        <?php
        FlashMessage::display();
        ?>
        <!-- On tables -->
        <div class="row m-5">
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th class="col-md-2 bg-transparent text-white">Photo</th>
                        <th class="col-md-2 bg-transparent text-white">Nom</th>
                        <th class="col-md-3 bg-transparent text-white">Ingrédients</th>
                        <th class="col-md-3 bg-transparent text-white">Etapes</th>
                        <th class="col-md-1 bg-transparent text-white">Modifier</th>
                        <th class="col-md-1 bg-transparent text-white">Supprimer</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($cocktails as $cocktail) { ?>
                        <tr>

                            <td class="col-md-2 bg-transparent text-white">
                                <div class="d-flex justify-content-center "><img class="col-md-8 " src="/public/uploads/cocktail/<?= $cocktail->pictures_name ?>" alt=""></div>
                            </td>
                            <td class="col-md-2 bg-transparent text-white"><?= $cocktail->name ?></td>
                            <td class="col-md-3 bg-transparent text-white"><?= $cocktail->ingredients ?></td>
                            <td class="col-md-3 bg-transparent text-white"><?= $cocktail->stages ?></td>
                            <td class="col-md-2 bg-transparent text-white"><a class="updateBtn btn" href="/controllers/dashboard/update_cocktail_ctrl.php?action=update&id_cocktail=<?= $cocktail->id_cocktail ?>"><img src="/public/assets/img/update.png" alt="boutton update"></a></td>
                            <td class="col-md-2 bg-transparent text-white"><a class="deleteBtn btn" href="/controllers/dashboard/list_cocktail_ctrl.php?action=delete&id_cocktail=<?= $cocktail->id_cocktail ?>"><img src="/public/assets/img/corbeille.png" alt="boutton supprimer"></a></td>
                        </tr><?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</main>