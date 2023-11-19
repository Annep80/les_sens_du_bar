<main class="coktailOfMonth container-fluid">
    <div class="row justify-content-center mt-5">
        <?php foreach ($cocktails as $cocktail) { ?>
            <div class="card col-10 col-md-5 m-5 mb-5">
                <img src="/../../public/uploads/cocktail/<?= $cocktail->pictures_name ?>" class="card-img-top mt-3 " alt="cocktail bunny mary">
                <div class="row">
                    <h1 class="mt-5"><?= $cocktail->name?></h1>
                    <div class="card-body ">
                        <h2 class="card-text mt-4 ">Ingrédients:</h2>
                        
                            <p class="card-text mb-4">
                                
                                <?= nl2br(html_entity_decode($cocktail->ingredients)) ?>
                            </p>

                        <h2>Préparation:</h2>
                        
                            <p><?= nl2br(html_entity_decode($cocktail->stages)) ?></p>
                            
                        
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</main>