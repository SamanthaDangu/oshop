# composer

## Métaphore d'alexandre Carli : Composer Un manager de dépendance

On peut le voir comme un accès à une bibliothéque.

Cette bibliothéque est nommé "packagist".

On y retrouve tout les livres de la bibliothèque.

Le dossier `vendor` ont y retrouve tous les livres que nous avons pris dans cette bibliothèque.

Le fichier `composer.json` répertorie l'ensemble des livres que nous avons choisit sur `packagist`.

Le fichier `composer.lock` nous donnes des informations détaillées sur nos livres.

========
Installation de composer :
[Site officiel](https://getcomposer.org/)

Liste de toutes les dépendances :
[Site Packagist](https://packagist.org/)

Pour que nos ajouts fonctionnent (ex : var_dumper, altorouter, etc), il faut ajouter dans notre index.

```php
require '../vendor/autoload.php';
```

Merci @Benji O'clock pour le relecture :clin_d'œil:

## installation d'un package

cette commande doit être faite à la racine du projet

exemple avec altorouter : `composer require altorouter/altorouter`

cette commande a créé deux fichiers :

* composer.json : la liste des packages du projet (et plus encore 😄 )
* composer.lock : ce sont des informations pour composer, on a rien à y faire

cette commande à créé un dossier `vendor`
ce dossier est un dossier de travail pour composer
⚠ ON NE DOIT JAMAIS MODIFIER LES FICHIERS DE CE DOSSIER
dans ce dossier composer va y installer les packages.
les fichiers dans ce dossier ne nous appartiennent pas.

puisque ce dossier est géré par composer, et que le fichier `composer.json` contient la liste des packages, nous n'avons pas besoin de livrer/commit ce dossier.
Composer se chargera de réinstaller les packages quand on fera un `git clone`

## fichier .gitignore

ou comment interdire à git de livrer/commit des fichiers/dossiers

## Comment on dit à composer d'installer les packages ?

Dans le fichier `composer.json` il y la liste des packages, on peut donc demander à composer d'installer ces packages avec la commande `composer install`
