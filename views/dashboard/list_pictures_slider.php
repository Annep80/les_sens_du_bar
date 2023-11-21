<main>

    <div class="container-fluid">
        <div class="row text-center">
            <a class=" m-5 col-md-1" href="/controllers/dashboard/dashboard_home_ctrl.php"><img src="/public/assets/img/retourJaune.png" alt="boutton retour"></a>
            <h1 class="mb-5">Liste des images du carrousel </h1>
            <a href="/controllers/dashboard/add_pictures_ctrl.php">ajouter une image</a>

        </div>
        <!-- On tables -->
        <div class="row  m-5">
            <table class="table-bordered  ">
                <thead>
                    <tr>
                        <th class="col-md-5 bg-transparent text-white">Nom de l'image</th>
                        <th class="col-md-5 bg-transparent text-white">Aperçu</th>
                        <th class="col-md-2 bg-transparent text-white">Supprimer</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($sliderPictures as $sliderPicture) { ?>
                        <tr>
                            <td class="col-md-5 bg-transparent text-white"><?= $sliderPicture->pictures_name ?></td>
                            <td class="bg-transparent text-white img-fluid"><img class="col-md-2" src="/public/uploads/slider/<?= $sliderPicture->pictures_name ?>" alt=""></td>
                            <td class="col-md-2"><a class="deleteBtn btn " href="/controllers/dashboard/delete_slider_picture_ctrl.php?action=delete&id_slider=<?= $sliderPicture->id_slider ?>"><img src="/public/assets/img/corbeille.png" alt="boutton supprimer"></a></td>
                        </tr><?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>