<?php

// J'utilise et j'ai besoin de tous les packages de composer -> composer install
require __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../app/Controllers/CoreController.php';
require_once __DIR__ . '/../app/Controllers/MainController.php';
require_once __DIR__ . '/../app/Controllers/CatalogueController.php';

require_once __DIR__ . '/../app/Utils/Database.php';

require_once __DIR__ . '/../app/Models/CoreModel.php';
require_once __DIR__ . '/../app/Models/Product.php';
require_once __DIR__ . '/../app/Models/Brand.php';
require_once __DIR__ . '/../app/Models/Category.php';
require_once __DIR__ . '/../app/Models/Type.php';


// AltoRouter nous permet de faire des routes plus simplifiées
$router = new AltoRouter();

// $_SERVER['BASE_URI'] contient l'URL de base de notre site
// var_dump($_SERVER['BASE_URI']); -> /S05/S05-projet-oShop-SamanthaDangu/public'
// on dit à altorouter de regarder la route à partir de notre URL de base
$router->setBasePath($_SERVER['BASE_URI']);


// je crée ici mes routes
// home
$router->map( // home
  'GET', // On récupère les données de la page avec un GET 
  '/', // ça correspond à notre valeur de $_GET['page'] -> route
  [
    'controller' => 'MainController', // ça correspond à nos informations de route les valeurs de notre tableau de route
    'method' => 'home'
  ],
  'home' // le nom de la route -> UNIQUE
);

// /category
$router->map(
  'GET', //var_dump($_GET); -> /category/
  '/category', // route statique
  [
    'controller' => 'CatalogueController',
    'method' => 'category'
  ],
  'category'
);

// /types
$router->map(
  'GET', //var_dump($_GET); -> /types
  '/types', // route statique
  [
    'controller' => 'CatalogueController',
    'method' => 'types'
  ],
  'types'
);

// /marques
$router->map(
  'GET', //var_dump($_GET); -> /types/
  '/marques', // route statique
  [
    'controller' => 'CatalogueController',
    'method' => 'brand'
  ],
  'brand'
);

// /blog
$router->map(
  'GET', //var_dump($_GET); -> /blog
  '/blog', // route statique
  [
    'controller' => 'MainController',
    'method' => 'blog'
  ],
  'blog'
);

// /contact
$router->map(
  'GET', //var_dump($_GET); -> /contact
  '/contact', // route statique
  [
    'controller' => 'MainController',
    'method' => 'contact'
  ],
  'contact'
);

// /mentions-legales
$router->map(
  'GET', //var_dump($_GET); -> /mentions-legales/
  '/mentions-legales', // route statique
  [
    'controller' => 'MainController',
    'method' => 'mentionsLegales'
  ],
  'mentions-legales'
);

// Conditions générales de vente
$router->map(
  'GET', //var_dump($_GET); -> /mentions-legales/
  '/conditions-generales', // route statique
  [
    'controller' => 'MainController',
    'method' => 'conditionsGenerales'
  ],
  'conditions-generales'
);

// /catalogue/category/40 
$router->map(
  'GET', //var_dump($_GET); -> /catalogue/category/
  '/catalogue/category/[i:id]', // [i:id] paramètre dynamique -> i = integer / id = nom de la variable qui recevra la valeur de l'URL
  [
    'controller' => 'CatalogueController',
    'method' => 'getProductByCategory'
  ],
  'catalog-product-by-category'
);

// /catalogue/type/40 
$router->map(
  'GET', //var_dump($_GET); -> /catalogue/type/
  '/catalogue/type/[i:id]', // [i:id] paramètre dynamique -> i = integer / id = nom de la variable qui recevra la valeur de l'URL
  [
    'controller' => 'CatalogueController',
    'method' => 'getProductByType'
  ],
  'catalog-product-by-type'
);

// /catalogue/marque/2
$router->map(
  'GET', //var_dump($_GET); -> /catalogue/marque/
  '/catalogue/marque/[i:id]',
  [
    'controller' => 'CatalogueController',
    'method' => 'getProductByBrand'
  ],
  'catalog-product-by-brand'
);

$router->map(
  'GET',
  '/catalogue/produit/[i:id]',
  [
      'controller' => 'CatalogueController',
      'method' => 'productDetail'
  ],
  'catalogue_product_detail'
);

// appel de la méthode associé à la route dispatcher
// on demande à notre router de vérifier si OUI ou NON la route existe
$match = $router->match();

//dump($match);
/*var_dump de symphony 
^ array:3 [▼
  "target" => array:2 [▼
    "controller" => "MainController"
    "method" => "home"
  ]
  "params" => []
  "name" => "home"
]*/


if ($match) {
  // si la route existe, on va :
  // 1. récupérer les informations de route 2. instancier notre controller 3. lancer la bonne méthode de notre controller

  // altorouter nous donne les infos associés à la clé "target" du tableau
  // On récupère la method et le controller donner a la route
  $methodePourAfficherLaPage = $match['target']['method'];

  $controllerPourAfficherLaPage = $match['target']['controller'];

  // $controller = new CatalogueController() // pour la page des category
  $controller = new $controllerPourAfficherLaPage();

  /*AltoRouter va récupéré la partie variable de la route -> [i:id]
    exemple [i:id] => altoRouter va me donner un tableau comme ci dessous : 
    "params" => array:1 [▼
        "id" => "42"]
    
    on y accède avec $match['params']*/

  $controller->$methodePourAfficherLaPage($match['params']);
  // PHP va d'abord remplacer la variable $methodePourAfficherLaPage par sa valeur
  // puis va éxecuter la méthode demandé

} else {
  // la page n'existe pas : page par défaut
  // On pourrait y mettre une 404
  //$controller = new MainController();
  //$controller->home();   
  echo "cette route n'existe pas !";
}
