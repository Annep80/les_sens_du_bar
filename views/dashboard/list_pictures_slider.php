<main>
    <div class="container-fluid">
        <div class="row text-center">
            <h1>Liste des images du carrousel </h1>
            <a href="/controllers/dashboard/add_pictures_ctrl.php">ajouter une image</a>

        </div>
        <!-- On tables -->
        <div class="row justify-content-center m-5">
            <table>
                <thead>
                    <tr>
                        <th class="col-md-5">Nom de l'image</th>
                        <th class="col-md-5">Aperçu</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($sliderPictures as $sliderPicture) { ?>
                        <tr>
                            <td class="col-md-5"><?= $sliderPicture->slider_pictures_name ?></td>
                            <td class=""><img class="col-md-2" src="/public/uploads/slider/<?= $sliderPicture->slider_pictures_name ?>" alt=""></td>
                            <td><a class="deleteBtn btn" href="/controllers/dashboard/delete_slider_picture_ctrl.php?action=delete&id_slider=<?= $sliderPicture->id_slider ?>"><img src="/public/assets/img/corbeille.png" alt="boutton supprimer"></a></td>
                        </tr><?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>