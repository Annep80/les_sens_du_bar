<main>

    <div class="container-fluid">
        <div class="row text-center">
        <a class=" m-5 col-md-1" href="/controllers/dashboard/dashboard_home_ctrl.php"><img src="/public/assets/img/retourJaune.png" alt="boutton retour"></a>
            <h1>Liste des demandes de contact </h1>


        </div>

        <?php
        FlashMessage::display();
        ?>
        <!-- On tables -->
        <div class="row justify-content-center m-5 ">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th class="col-md-2 bg-transparent text-white">Nom</th>
                        <th class="col-md-2 bg-transparent text-white">Prénom</th>
                        <th class="col-md-3 bg-transparent text-white">Email</th>
                        <th class="col-md-3 bg-transparent text-white">Téléphone</th>
                        <th class="col-md-1 bg-transparent text-white">Message</th>
                        <th class="col-md-1 bg-transparent text-white">Répondre</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($contacts as $contact) { ?>
                        <tr class="mb-5">

                            <td class="col-md-1 bg-transparent text-white"><?= $contact->lastname ?></td>
                            <td class="col-md-1 bg-transparent text-white"><?= $contact->firstname ?></td>
                            <td class="col-md-2 bg-transparent text-white"><?= $contact->email ?></td>
                            <td class="col-md-1 bg-transparent text-white"><?= $contact->phone ?></td>
                            <td class="col-md-7 bg-transparent text-white"><?= $contact->message ?></td>
                            <td class="col-md-2 bg-transparent text-white "><a class="deleteBtn btn" href="mailto:<?= $contact->email ?>"><img src="/public/assets/img/mailTo.png" alt="boutton répondre"></a></td>


                        </tr><?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</main>