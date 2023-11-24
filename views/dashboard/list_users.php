<main>

    <div class="container-fluid">
        <div class="row text-center">
            <a class=" m-5 col-md-1" href="/controllers/dashboard/dashboard_home_ctrl.php"><img src="/public/assets/img/retourJaune.png" alt="boutton retour"></a>

            <h1>Liste des utilisateurs</h1>

        </div>

        <!-- On tables -->
        <div class="row m-5">
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th class=" bg-transparent text-white">Nom</th>
                        <th class="bg-transparent text-white">Prénom</th>
                        <th class=" bg-transparent text-white">Date de naissance</th>
                        <th class=" bg-transparent text-white">Téléphone</th>
                        <th class=" bg-transparent text-white">Adresse mail</th>
                        <th class=" bg-transparent text-white">Adresse</th>
                        <th class=" bg-transparent text-white">Code postal</th>
                        <th class=" bg-transparent text-white">City</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($users as $user) { ?>
                        <tr>

                            <td class=" bg-transparent text-white"><?= $user->lastname ?></td>
                            <td class=" bg-transparent text-white"><?= $user->firstname ?></td>
                            <td class=" bg-transparent text-white"><?= date('d/m/Y', strtotime($user->birthday)) ?></td>
                            <td class=" bg-transparent text-white"><?= $user->phone ?></td>
                            <td class=" bg-transparent text-white"><?= $user->mail ?></td>
                            <td class=" bg-transparent text-white"><?= $user->address ?></td>
                            <td class=" bg-transparent text-white"><?= $user->zipcode ?></td>
                            <td class=" bg-transparent text-white"><?= $user->city ?></td>
                        </tr><?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</main>