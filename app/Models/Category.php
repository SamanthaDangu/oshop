<?php

class Category extends CoreModel
{
    private $subtitle;
    private $picture;
    private $home_order;
    
    public function getHome()
    {
        // select * from category where home_order >= 1 order by home_order
        // 1. se connecter à la base de donnée
        $pdo = Database::getPDO();
        // 2. faire la requete SQL
        $sql = 'select * from category where home_order >= 1 order by home_order';
        $pdoStatement = $pdo->query($sql);
        // 3. transformer le résultat en Objet
        $listObject = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Category');
        // 4. renvoyer (return) le résultat
        return $listObject;
    }

    // cette méthode nous permet d'obtenir un object de cette classe par son ID
    // on doit donc fournir l'id recherché en paramètre
    public function find($id)
    {
        // 1. se connecter à la base de donnée
        $pdo = Database::getPDO();
        // 2. faire la requete SQL
        $sql = "SELECT * FROM category where id = " . $id;
        $pdoStatement = $pdo->query($sql);
        // 3. transformer le résultat en Objet
        $objetResultat = $pdoStatement->fetchObject('Category');
        // 4. renvoyer (return) le résultat
        return $objetResultat;
    }

    // cette méthode nous permet d'obtenir TOUTES les catégories
    // il n'y a donc pas besoin de paramètre
    public function findAll()
    {
        // 1. se connecter à la base de donnée
        $pdo = Database::getPDO();
        // 2. faire la requete SQL
        $sql = 'SELECT * FROM category';
        $pdoStatement = $pdo->query($sql);
        // 3. transformer le résultat en Objet
        // https://www.php.net/manual/fr/pdostatement.fetchall.php
        $listObject = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Category');
        // 4. renvoyer (return) le résultat
        return $listObject;
    }

    public function findForHome()
    {
        // Préparer le SQL => adminer
        $sql = "SELECT *
        FROM `category`
        WHERE 
        `home_order` != 0
        ORDER BY home_order";
        // je récupère UN ou PLUSIEURS objet ?
        // UN ==> fetch()
        // ----->  PLUSIEURS ==> fetchAll()

        // 1. se connecter à la base de donnée
        $pdo = Database::getPDO();
        // 2. faire la requete SQL
        $pdoStatement = $pdo->query($sql);
        // 3. transformer le résultat en Objet
        // https://www.php.net/manual/fr/pdostatement.fetchall.php
        $listObject = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Category');
        // 4. renvoyer (return) le résultat
        return $listObject;
    }

    public function getSubtitle()
    {
        return $this->subtitle;
    }

    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }
    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    public function getHome_order()
    {
        return $this->home_order;
    }

    public function setHome_order($home_order)
    {
        $this->home_order = $home_order;
    }
}