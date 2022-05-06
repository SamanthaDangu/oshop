<h1>Liste des types</h1>
<?php foreach($viewData['listeProduit'] as $type): ?>
    <a href="<?= $router->generate('catalog-product-by-type', ['id' => $type->getId()]) ?>" class="btn btn-light">
        <h4 class="display-3 font-weight-bold mb-4"><?= $type->getname() ?> <br></h4>
    </a>
<?php endforeach; ?>