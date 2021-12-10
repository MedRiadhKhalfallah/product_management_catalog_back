<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Prérequi


Prérequis sur votre machine pour le bon fonctionnement de ce projet :
<ul>
    <li>PHP Version 7.4</li>
    <li>MySQL Installer MySQL ou Installer MariaDB</li>
    <li>Composer Installer Composer</li>
</ul>

## Installation


Après avoir cloné le projet avec <code>git clone https://github.com/MedRiadhKhalfallah/product_management_catalog_back.git</code>

Exécutez la commande <code>cd product_management_catalog_back</code> pour vous rendre dans le dossier depuis le terminal.

Ensuite, dans l'ordre taper les commandes dans votre terminal :

1 <code>composer install</code> afin d'installer toutes les dépendances composer du projet.

2 installer la base de donnée MySQL : Créer une table nommée "<b>managementcatalog</b>" , rdv dans le fichier .env du projet, et modifier la variable d'environnement :
<br>
<code>
DB_CONNECTION=mysql</code><br><code>  
DB_HOST=127.0.0.1</code><br><code>  
DB_PORT=3306</code><br><code>  
DB_DATABASE=managementcatalog</code><br><code>  
DB_USERNAME=root</code><br><code>  
DB_PASSWORD=
</code>

3 Exécuter la migration en base de donnée : <code>php artisan migrate</code>

4 Vous pouvez maintenant accéder à votre application en vous connectant au serveur : <code>php artisan serve</code>


