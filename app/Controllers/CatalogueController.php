<?php

class CatalogueController extends CoreController {

    // on veut voir toutes les category
    public function category($parametreDeLaRoute)
    {   
        $categoryModel = new Category(); // on appelle la bdd
        $categoryList = $categoryModel->findAll(); // on selectionne la method qu'on a besoin
        $parametreDeLaVue = []; // on créer une variable pour mettre nos infos dedans
        $parametreDeLaVue['listeProduit'] = $categoryList;
        
        // je veux afficher category.tpl.php
        $this->show('category', $parametreDeLaVue);
    }

    // on veut voir toutes les types 
    public function types()
    {
        $typeModel = new Type(); // on appelle la bdd
        $typeList = $typeModel->findAll(); // on selectionne la method qu'on a besoin
        $parametreDeLaVue = []; // on créer une variable pour mettre nos infos dedans
        $parametreDeLaVue['listeProduit'] = $typeList;
        
        // je veux afficher type.tpl.php
        $this->show('types', $parametreDeLaVue);
    }

    // on veut voir toutes les brand
    public function brand()
    {
        $brandModel = new Brand(); // on appelle la bdd
        $brandList = $brandModel->findAll(); // on selectionne la method qu'on a besoin
        $parametreDeLaVue = []; // on créer une variable pour mettre nos infos dedans
        $parametreDeLaVue['listeProduit'] = $brandList;


        // je veux afficher brand.tpl.php
        $this->show('brand', $parametreDeLaVue);
    }

    // on veut voir les produits associés à une marque
    public function getProductByBrand($parametreDeLaRoute)
    {
         // $parametreDeLaRoute est un tableau de paramètre venant de AltoRouter
        /*
        [▼
        "id" => "42"
        ]
        */
        
        // Pour respecter Active Record
        // je dois demander à la classe Product d'aller chercher les données en BDD
        // Pour cela je commence par créer une nouvelle Classe Product
        $productModel = new Product(); 
        // j'appelle ensuite la méthode pour obtenir les listes des produits par marque
        // cette méthode doit recevoir un id qui vient de la route
        // cette méthode nous renvoit un tableau d'objet Product
        $productList = $productModel->getProductByBrand($parametreDeLaRoute['id']);

        // je crée une nouvelle variable pour rassembler toutes les informations
        // nécessaire à l'affichage de ma vue
        // j'y inclus l'id du type
        // et le résultat de la requete
        $parametreDeLaVue = [];
        $parametreDeLaVue['id'] = $parametreDeLaRoute['id'];
        $parametreDeLaVue['listeProduit'] = $productList;

        // je veux afficher ma page de produits par type
        //* temporairement je donne à ma vue les paramètres de la route
        $this->show('product_list_by_brand', $parametreDeLaVue);
    }
    // on veut voir les produits associés à un type
    public function getProductByType($parametreDeLaRoute)
    {
        $productModel = new Product();
        $listProduct =  $productModel->getProductByType($parametreDeLaRoute['id']);

        $parametreDeLaVue = [];
        $parametreDeLaVue['id'] = $parametreDeLaRoute['id'];
        $parametreDeLaVue['listeProduit'] = $listProduct;

        // je veux afficher ma page de produits par type
        //* temporairement je donne à ma vue les paramètres de la route
        $this->show('product_list_by_type', $parametreDeLaVue);
    }
    // on veut voir les produits associés à une category
    public function getProductByCategory($parametreDeLaRoute)
    {
        $productModel = new Product();
        $listProduct =  $productModel->getProductByCategory($parametreDeLaRoute['id']);

        $parametreDeLaVue = [];
        $parametreDeLaVue['id'] = $parametreDeLaRoute['id'];
        $parametreDeLaVue['listeProduit'] = $listProduct;

        // je veux afficher la page products_list.tpl.php
        $this->show('product_list_by_category', $parametreDeLaVue);
    }

    public function productDetail($parametreDeLaRoute)
    {
        //! j'ai uniquement l'ID du produit
        // BDD => Model => product
        // je cherche product by id => find($id)
        $productModel = new Product();
        $product = $productModel->findWithType($parametreDeLaRoute['id']);
        // dump($product);
        
        // BDD => Model => brand
        // je cherche un brand comment ? par le brand_id de $product
        $brandModel = new Brand();
        $brand = $brandModel->find($product->getBrand_id());

        $categoryModel = new Category();
        $category = $categoryModel->find($product->getCategory_id());
        // dump($category);

        // parametre pour la vue
        $parametreDeLaVue=[];
        $parametreDeLaVue['produit'] = $product;

        $parametreDeLaVue['marque'] = $brand;
        $parametreDeLaVue['categorie'] = $category;

        // méthode show avec le nom et les paramètre
        $this->show('product', $parametreDeLaVue);
    }
    
}