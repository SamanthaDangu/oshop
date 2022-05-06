<?php

class Personne 
{
    
    // la visibilité protected c'est private 
    // SAUF pour l'héritage / enfant
    // protected accessible seulement DANS la class et dans les héritages
    protected $nom;
    
    // public accessible DANS et en dehors de la class
    public $prenom;
    // cette propriété n'est pas hérité
    // les enfants n'ont pas de numéro de sécu
    // private seulement DANS la classe
    private $numeroSecu;

    public function __construct($nom)
    {
        $this->nom = $nom;
    }

    public function getNom(){return $this->nom;}

    public function sayHello()
    {
        echo "Bonjour, je suis " . $this->nom;
        echo "<br>";
         // __CLASS__ est comme __DIR__, c'est une constante magique contenant le nom de la classe dans laquelle on y accède
        echo ' [classe ' . __CLASS__ . ']';
    }
}