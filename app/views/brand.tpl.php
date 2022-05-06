<h1>Liste des marques</h1>
<?php foreach($viewData['listeProduit'] as $brand): ?>
    <a href="<?= $router->generate('catalog-product-by-brand', ['id' => $brand->getId()]) ?>" class="btn btn-light">
        <h4 class="display-3 font-weight-bold mb-4"><?= $brand->getname() ?></h4>
    </a>
<?php endforeach; ?>
