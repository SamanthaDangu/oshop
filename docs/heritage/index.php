<?php

require_once __DIR__ . '/Classes/Personne.php';
require_once __DIR__ . '/Classes/SuperHero.php';

$benji = new Personne("Gahéry");
//var_dump($benji);
$benji->prenom = "Benjamin";

// Fatal error: Uncaught Error: Cannot access protected property Personne::$nom
// echo $benji->nom;
// Benjamin Gahéry
$benji->sayHello();
echo "<hr>";

$superBenji = new SuperHero("SuperMan");
//var_dump($superBenji);
$superBenji->prenom = "SuperBenji";

//SuperBenji SuperMan
$superBenji->sayHello();