<main class="coktailOfMonth container-fluid">
    <div class="row text-center">
        <div>
            <h1>Cocktails du mois</h1>
        </div>
    </div>
    
    <div class="row justify-content-center mt-5">
        <?php foreach ($cocktails as $cocktail) { ?>
            <div class="card col-10 col-md-4 m-5 mb-5">
                <img src="/../../public/uploads/cocktail/<?= $cocktail->pictures_name ?>" class="card-img-top mt-3 " alt="cocktail bunny mary">
                <div class="row">
                    <h2 class="cocktailName m-0"><?= $cocktail->name?></h2>
                    <div class="card-body ">
                        <h3 class="card-text ">Ingrédients:</h3>
                            <p class="card-text m-0">
                                <?= nl2br(html_entity_decode($cocktail->ingredients)) ?>
                            </p>
                        <h3>Préparation:</h3>
                            <p><?= nl2br(html_entity_decode($cocktail->stages)) ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</main>