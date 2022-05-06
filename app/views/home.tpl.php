<?php /*dump($viewData);*/ ?>
<section>
    <div class="container-fluid">
      <div class="row mx-0">
        <?php for($index = 0; $index <= 1; $index++) : ?>
        <?php
          // ici j'ai un index qui va de 0 à 1
          // je peux donc l'utiliser pour obtenir l'élément 0 ou 1 du tableau
          // $viewData['listCategory'] contient le tableau que je veux parcourir
          // $viewData['listCategory'][0]  pour obtenir l'élément 0
          // $viewData['listCategory'][$index]  pour obtenir l'élément avec $index
          // Comme on a extract() dans la méthode show() on pourrait utiliser $listCategory[$index]
          // pour me simplifier la tâche je vais créer une variable à laquelle je vais associer l'objet catégorie
          $currentCategory = $viewData['listCategory'][$index];
          // $currentCategory = $listCategory[$index]; // version avec extract()
        ?>
        <div class="col-md-6">
          <div class="card border-0 text-white text-center"><img src="<?= $currentCategory->getPicture() ?>"
              alt="Card image" class="card-img">
            <div class="card-img-overlay d-flex align-items-center">
              <div class="w-100 py-3">
                <h2 class="display-3 font-weight-bold mb-4"><?= $currentCategory->getName() ?></h2><a href="<?= $router->generate('catalog-product-by-category', ['id' => $currentCategory->getId()]) ?>" class="btn btn-light"><?= $currentCategory->getSubtitle() ?></a>
              </div>
            </div>
          </div>
        </div>
        <?php endfor; ?>
      </div>
      <div class="row mx-0">
      <?php for($index = 2; $index <= 4; $index++) : ?>
        <?php $currentCategory = $viewData['listCategory'][$index]; ?>
        <div class="col-lg-4">
          <div class="card border-0 text-center text-white"><img src="<?= $currentCategory->getPicture() ?>"
              alt="Card image" class="card-img">
            <div class="card-img-overlay d-flex align-items-center">
              <div class="w-100">
                <h2 class="display-4 mb-4"><?= $currentCategory->getName() ?></h2><a href="<?= $router->generate('catalog-product-by-category', ['id' => $currentCategory->getId()]) ?>" class="btn btn-link text-white"><?= $currentCategory->getSubtitle() ?>
                  <i class="fa-arrow-right fa ml-2"></i></a>
              </div>
            </div>
          </div>
        </div>
        <?php endfor; ?>
      </div>
    </div>
  </section>

  