<?php

// Correspond à la table Product

class Product extends CoreModel
{
    private $description;
    private $picture;
    private $price;
    private $rate;
    private $status;
    private $brand_id;
    private $category_id;
    private $type_id;
    private $categoryID;
    private $categoryName;
    private $categoryPicture;
    private $categoryCreated_at;
    private $categoryUpdated_at;
    private $brandID ;
    private $brandName ;
    private $brandFooter_order ;
    private $brandCreated_at ;
    private $brandUpdated_at;
    private $typeID ;
    private $typeName ;
    private $typeFooter_order ;
    private $typeCreated_at ;
    private $typeUpdated_at;

    // cette méthode nous permet d'obtenir tous les produits d'une marque
    // on doit fournir l'id de la marque
    public function getProductByBrand($id)
    {
        // 1. se connecter à la base de donnée
        $pdo = Database::getPDO();
        // 2. faire la requete SQL
        $sql = 'SELECT p.id, p.name, description, p.picture, price, rate, status, p.created_at, p.updated_at, p.brand_id, p.category_id, p.type_id,
        b.id AS `brandID`,
        b.name AS `brandName`,
        b.footer_order AS `brandFooter_order`,
        b.created_at AS `brandCreated_at`,
        b.updated_at AS` brandUpdated_at`,
        c.id AS `categoryID`,
        c.name AS `categoryName` ,
        subtitle,
        c.picture AS `categoryPicture` ,
        home_order,
        c.created_at AS `categoryCreated_at`,
        c.updated_at AS` categoryUpdated_at`,
        t.id AS `typeID`,
        t.name AS `typeName`,
        t.footer_order AS `typeFooter_order`,
        t.created_at AS `typeCreated_at`,
        t.updated_at AS` typeUpdated_at`
        FROM product p
        JOIN brand b
        ON b.id = p.brand_id
        JOIN category c
        ON c.id = p.category_id
        JOIN type t
        ON t.id = p.type_id 
        WHERE brand_id =' . $id;
        $pdoStatement = $pdo->query($sql);
        // 3. transformer le résultat en Objet
        $listObject = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Product');
        // 4. renvoyer (return) le résultat
        return $listObject;
    }

    // cette méthode nous permet d'obtenir tous les produits d'une catégorie
    // on doit fournir l'id de la marque
    public function getProductByCategory($id)
    {
        // 1. se connecter à la base de donnée
        $pdo = Database::getPDO();
        // 2. faire la requete SQL
        $sql = 'SELECT p.id, p.name, description, p.picture, price, rate, status, p.created_at, p.updated_at, p.brand_id, p.category_id, p.type_id,
        b.id AS `brandID`,
        b.name AS `brandName`,
        b.footer_order AS `brandFooter_order`,
        b.created_at AS `brandCreated_at`,
        b.updated_at AS` brandUpdated_at`,
        c.id AS `categoryID`,
        c.name AS `categoryName` ,
        subtitle,
        c.picture AS `categoryPicture` ,
        home_order,
        c.created_at AS `categoryCreated_at`,
        c.updated_at AS` categoryUpdated_at`,
        t.id AS `typeID`,
        t.name AS `typeName`,
        t.footer_order AS `typeFooter_order`,
        t.created_at AS `typeCreated_at`,
        t.updated_at AS` typeUpdated_at`
        FROM product p
        JOIN brand b
        ON b.id = p.brand_id
        JOIN category c
        ON c.id = p.category_id
        JOIN type t
        ON t.id = p.type_id 
        WHERE category_id =' . $id;
        // SELECT *, category.name AS `categoryName` FROM `product` JOIN `category` ON category.id = product.category_id WHERE category_id =' . $id
        $pdoStatement = $pdo->query($sql);
        // 3. transformer le résultat en Objet
        $listObject = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Product');
        // 4. renvoyer (return) le résultat
        return $listObject;
    }

    // cette méthode nous permet d'obtenir tous les produits d'un type
    // on doit fournir l'id du type
    public function getProductByType($id)
    {
        // 1. se connecter à la base de donnée
        $pdo = Database::getPDO();
        // 2. faire la requete SQL
        $sql = 'SELECT p.id, p.name, description, p.picture, price, rate, status, p.created_at, p.updated_at, p.brand_id, p.category_id, p.type_id,
        b.id AS `brandID`,
        b.name AS `brandName`,
        b.footer_order AS `brandFooter_order`,
        b.created_at AS `brandCreated_at`,
        b.updated_at AS` brandUpdated_at`,
        c.id AS `categoryID`,
        c.name AS `categoryName` ,
        subtitle,
        c.picture AS `categoryPicture` ,
        home_order,
        c.created_at AS `categoryCreated_at`,
        c.updated_at AS` categoryUpdated_at`,
        t.id AS `typeID`,
        t.name AS `typeName`,
        t.footer_order AS `typeFooter_order`,
        t.created_at AS `typeCreated_at`,
        t.updated_at AS` typeUpdated_at`
        FROM product p
        JOIN brand b
        ON b.id = p.brand_id
        JOIN category c
        ON c.id = p.category_id
        JOIN type t
        ON t.id = p.type_id 
        WHERE type_id =' . $id;
        $pdoStatement = $pdo->query($sql);
        // 3. transformer le résultat en Objet
        $listObject = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Product');
        // 4. renvoyer (return) le résultat
        return $listObject;
    }

    // cette méthode nous permet d'obtenir un Product par son ID
    // on doit donc fournir l'id recherché en paramètre
    public function find($id)
    {
        // 1. se connecter à la base de donnée
        $pdo = Database::getPDO();
        // 2. faire la requete SQL
        $sql = 'SELECT * FROM product WHERE id = ' . $id;
        $pdoStatement = $pdo->query($sql);
        // 3. transformer le résultat en Objet pour transforme le résultat en objet
        // il faut préciser la classe à utiliser
        // fetchObject va transformer le résultat en un object de la class 'Product'
        // https://www.php.net/manual/fr/pdostatement.fetchobject.php
        $objetResultat = $pdoStatement->fetchObject('Product');
        // 4. renvoyer (return) le résultat
        return $objetResultat;
    }
    
    // cette méthode nous permet d'obtenir TOUS les produits
    // il n'y a donc pas besoin de paramètre
    public function findAll()
    {
        // 1. se connecter à la base de donnée
        $pdo = Database::getPDO();
        // 2. faire la requete SQL
        $sql = 'SELECT * FROM product';
        $pdoStatement = $pdo->query($sql);
        // 3. transformer le résultat en Objet
        // https://www.php.net/manual/fr/pdostatement.fetchall.php
        $listObject = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Product');
        // 4. renvoyer (return) le résultat
        return $listObject;
    }

    // cette méthode nous permet d'obtenir un Product par son ID
    // on doit donc fournir l'id recherché en paramètre
    public function findWithType($id)
    {
        // 1. se connecter à la base de donnée
        $pdo = Database::getPDO();
        // 2. faire la requete SQL
        $sql = 'SELECT *
                from product
                JOIN type ON product.type_id = type.id
                WHERE product.id = ' . $id;
        $pdoStatement = $pdo->query($sql);
        // 3. transformer le résultat en Objet
        // pour transforme le résultat en objet
        // il faut préciser la classe à utiliser
        // fetchObject va transformer le résultat en un object de la class 'Product'
        // https://www.php.net/manual/fr/pdostatement.fetchobject.php
        $objetResultat = $pdoStatement->fetchObject('Product');
        // 4. renvoyer (return) le résultat
        return $objetResultat;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function getRate()
    {
        return $this->rate;
    }

    public function setRate($rate)
    {
        $this->rate = $rate;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getBrand_id()
    {
        return $this->brand_id;
    }

    public function setBrand_id($brand_id)
    {
        $this->brand_id = $brand_id;
    }

    public function getCategory_id()
    {
        return $this->category_id;
    }

    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;
    }

    public function getType_id()
    {
        return $this->type_id;
    }

    public function setType_id($type_id)
    {
        $this->type_id = $type_id;
    }
    
    public function getCategoryName()
    {
        return $this->categoryName;
    }

    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;
    }

    public function getCategoryID()
    {
        return $this->categoryID;
    }

    public function setCategoryID($categoryID)
    {
        $this->categoryID = $categoryID;

        return $this;
    }

    public function getCategoryPicture()
    {
        return $this->categoryPicture;
    }

    public function setCategoryPicture($categoryPicture)
    {
        $this->categoryPicture = $categoryPicture;
    }

    public function getCategoryCreated_at()
    {
        return $this->categoryCreated_at;
    }

    public function setCategoryCreated_at($categoryCreated_at)
    {
        $this->categoryCreated_at = $categoryCreated_at;
    }

    public function getCategoryUpdated_at()
    {
        return $this->categoryUpdated_at;
    }

    public function setCategoryUpdated_at($categoryUpdated_at)
    {
        $this->categoryUpdated_at = $categoryUpdated_at;
    }

    public function getBrandID()
    {
        return $this->brandID;
    }

    public function setBrandID($brandID)
    {
        $this->brandID = $brandID;
    }

    public function getBrandName()
    {
        return $this->brandName;
    }

    public function setBrandName($brandName)
    {
        $this->brandName = $brandName;
    }

    public function getBrandFooter_order()
    {
        return $this->brandFooter_order;
    }

    public function setBrandFooter_order($brandFooter_order)
    {
        $this->brandFooter_order = $brandFooter_order;
    }

    public function getBrandCreated_at()
    {
        return $this->brandCreated_at;
    }

    public function setBrandCreated_at($brandCreated_at)
    {
        $this->brandCreated_at = $brandCreated_at;
    }

    public function getBrandUpdated_at()
    {
        return $this->brandUpdated_at;
    }

    public function setBrandUpdated_at($brandUpdated_at)
    {
        $this->brandUpdated_at = $brandUpdated_at;
    }

    /**
     * Get the value of typeID
     */ 
    public function getTypeID()
    {
        return $this->typeID;
    }

    /**
     * Set the value of typeID
     *
     * @return  self
     */ 
    public function setTypeID($typeID)
    {
        $this->typeID = $typeID;

        return $this;
    }

    /**
     * Get the value of typeName
     */ 
    public function getTypeName()
    {
        return $this->typeName;
    }

    /**
     * Set the value of typeName
     *
     * @return  self
     */ 
    public function setTypeName($typeName)
    {
        $this->typeName = $typeName;

        return $this;
    }

    /**
     * Get the value of typeFooter_order
     */ 
    public function getTypeFooter_order()
    {
        return $this->typeFooter_order;
    }

    /**
     * Set the value of typeFooter_order
     *
     * @return  self
     */ 
    public function setTypeFooter_order($typeFooter_order)
    {
        $this->typeFooter_order = $typeFooter_order;

        return $this;
    }

    /**
     * Get the value of typeCreated_at
     */ 
    public function getTypeCreated_at()
    {
        return $this->typeCreated_at;
    }

    /**
     * Set the value of typeCreated_at
     *
     * @return  self
     */ 
    public function setTypeCreated_at($typeCreated_at)
    {
        $this->typeCreated_at = $typeCreated_at;

        return $this;
    }

    /**
     * Get the value of typeUpdated_at
     */ 
    public function getTypeUpdated_at()
    {
        return $this->typeUpdated_at;
    }

    /**
     * Set the value of typeUpdated_at
     *
     * @return  self
     */ 
    public function setTypeUpdated_at($typeUpdated_at)
    {
        $this->typeUpdated_at = $typeUpdated_at;

        return $this;
    }
}
