# Terps Only Shop

Mini boutique en ligne avec interface admin, connectée à une base de données MySQL.

## Fonctionnalités

- Catalogue de produits (image, nom, prix, prix par quantité)
- Bouton "Commander" redirigeant vers Telegram
- Interface d'administration pour ajouter/supprimer des produits
- Connexion à une base de données MySQL via PDO

## Installation

1. Uploade les fichiers sur ton serveur PHP (Apache/Nginx).
2. Crée la base de données et la table `products` avec le script SQL ci-dessous.
3. Adapte les informations de connexion à la BDD dans `config.php`.

## Base de données

Crée cette table dans ta base MySQL (`terps_only`) :

```sql
CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  price DECIMAL(10,2),
  image TEXT,
  quantity_prices TEXT
);
```

## Informations SQL

- URL phpMyAdmin : http://38.180.39.155:888/phpmyadmin_6470d382c7b18a54/index.php
- Serveur : localhost
- Utilisateur : `terpsonly`
- Base de données : `terps_only`

## Accès admin

Rends-toi sur `admin.php` pour ajouter/modifier les produits.