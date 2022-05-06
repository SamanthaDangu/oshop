<?php

// Sinon on ne connait pas la classe parent
require_once __DIR__ . '/Personne.php';

class SuperHero extends Personne
{
    // par héritage j'ai la propriété $nom
    // par héritage j'ai la propriété $prenom
    public $pseudoSuperHero;

}
