<h1> Liste des catégories </h1></br>
<?php foreach($viewData['listeProduit'] as $category): ?>
    <a href="<?= $router->generate('catalog-product-by-category', ['id' => $category->getId()]) ?>" class="btn btn-light">
        <h4 class="display-3 font-weight-bold mb-4"><?= $category->getname() ?></h4>
    </a>
<?php endforeach; ?>
