<?php 
class CoreController{

    public function show($viewName, $viewData = [])
    {
        //! ATTENTION à la portée des variables 
        // je suis dans une function
        // je n'ai donc pas accès aux variables en dehors de la function. ($weekopeningHours)
        // j'ai accès UNIQUEMENT aux paramètres venant de l'extérieur
         
        global $router;

        extract($viewData);
        // var_dump($viewData);
        // $viewData est disponible dans chaque fichier de vue
        // __DIR__ => /Controllers
        // il faut donc remonter d'un dossier (..) 
        // pour ensuite aller dans le dossier views
        // var_dump(__DIR__);
        // /var/www/html/Yuna/S05/S05-E01-exo-controllers-views-JB-oclock/Controllers
        // si je colle directement le .., PHP va penser que c'est le nom : Controllers..
        // et non pas la commande pour remonter d'un dossier
        // il faut donc rajouter un / entre Controllers et ..
        $categoryModel = new Category();
        $allCategoryForHome = $categoryModel->getHome();

        require_once __DIR__ . '/../views/header.tpl.php';
        require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
        // pour le footer, j'ai besoin de la liste mise en avant des types
        // je demande donc au model Type
        $typeModel = new Type();
        $allTypeForFooter = $typeModel->getFooter();
        // maintenant que j'ai la liste des type pour le footer
        // je vais dans ma vue les dynamiser

        // même chose pour les brand
        $brandModel = new Brand();
        $allBrandForFooter = $brandModel->getBrandByOrder();
        
        require_once __DIR__ . '/../views/footer.tpl.php';
    }

}