<?php

class Brand extends CoreModel
{
    private $footer_order;

    // cette méthode nous permet d'obtenir un object de cette classe par son ID
    // on doit donc fournir l'id recherché en paramètre
    public function find($id)
    {
        // 1. se connecter à la base de donnée
        $pdo = Database::getPDO();
        // 2. faire la requete SQL
        $sql = "SELECT * FROM brand where id = " . $id;
        $pdoStatement = $pdo->query($sql);
        // 3. transformer le résultat en Objet
        $objetResultat = $pdoStatement->fetchObject('Brand');
        // 4. renvoyer (return) le résultat
        return $objetResultat;
    }

    // cette méthode nous permet d'obtenir TOUTES les marques
    // il n'y a donc pas besoin de paramètre
    public function findAll()
    {
        // 1. se connecter à la base de donnée
        $pdo = Database::getPDO();
        // 2. faire la requete SQL
        $sql = 'SELECT * FROM brand';
        $pdoStatement = $pdo->query($sql);
        // 3. transformer le résultat en Objet
        // https://www.php.net/manual/fr/pdostatement.fetchall.php
        $listObject = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Brand');
        // 4. renvoyer (return) le résultat
        return $listObject;
    }

    public function getBrandByOrder()
    {
        // 1. se connecter à la base de donnée
        $pdo = Database::getPDO();
        // 2. faire la requete SQL
        $sql = 'select * from brand where footer_order != 0 order by footer_order';
        $pdoStatement = $pdo->query($sql);
        // 3. transformer le résultat en Objet
        // https://www.php.net/manual/fr/pdostatement.fetchall.php
        $listeBrand = $pdoStatement->fetchAll(PDO::FETCH_CLASS,'Brand');
        // 4. renvoyer (return) le résultat
        return $listeBrand;
    }

    public function getFooter_order()
    {
        return $this->footer_order;
    }

    public function setFooter_order($footer_order)
    {
        $this->footer_order = $footer_order;
    }
}