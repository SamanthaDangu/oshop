<?php 
// anciennement MainController
class MainController extends CoreController{

    public function home()
    {
        // je veux afficher les 5 catégories de produit mise en avant
        // 1. BDD => qui s'en occupe ? les Models
        // 1.1 Models : je veux quelle information ? catégories => Model Category
        // 1.2 Comment je demande au Model l'information que je veux ?
        //     --> existe-t-il une méthode qui correspond à mon objectif ?
        // --> NON, je la crée
        
        // 2. On récupère du Model les informations
        $categoryModel = new Category();
        $listeCategory = $categoryModel->findForHome();

        // 3. on prépare les informations pour la vue
        $parametreDeLaVue = [];
        $parametreDeLaVue['listCategory'] = $listeCategory;

        // 3.1 : quel sera le nom de la vue ? home.tpl.php
        // 3.1 bis : si la vue existe pas, on la crée
        // 4. on donne les informations à la vue
        $this->show('home', $parametreDeLaVue);
    }

    public function blog()
    {
        // je veux afficher blog.tpl.php
        $this->show('blog');
    }

    public function contact()
    {
        // je veux afficher contact.tpl.php
        $this->show('contact');
    }
    
    public function mentionsLegales()
    {
        // je veux afficher la page des mentions legales
        $this->show('mentions-legales');
    }

    public function conditionsGenerales()
    {
        // je veux afficher la page des conditions générales de vente
        $this->show('conditions-generales');
    }
}