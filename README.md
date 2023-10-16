# 49.3 Clicker

Ce clicker est un projet d'école de clicker humoristique faisant la satire de notre cher gouvernement.

## Langages utilisés

- PHP
- Javascript
- SQL

## Technologies utilisées 

- MySQL

## Responsivité

L'application prend en charge tous les supports et la plupart des résolutions.

## Installation du projet

### Prérequis

Afin d'installer le projet correctement, vous aurez besoin : 
- De [MySQL](https://www.mysql.com/fr/downloads/) ou [MariaDB](https://mariadb.org/download)
- De [PHP](https://www.php.net/downloads)
- D'[Apache](https://httpd.apache.org/download.cgi)
- De [Composer](https://getcomposer.org/download)

### Installation

1. Importez le projet.
2. Dans votre terminal allez à l'emplacement du projet, par exemple: 
 
```bash
cd ./Documents/49.3_Clicker
```

3. Importez le projet [Dotenv](https://github.com/vlucas/phpdotenv) créé par Vance Lucas et Graham Campbell avec cette commande : 

```bash
composer require vlucas/phpdotenv
```

4. Copiez le fichier `.env.example` et nommez le `.env`.
5. Dans le fichier .env remplacez les identifiants par défaut par les vôtres,
6. Importez la base de données `49.3_clicker.sql` dans votre base de données MySQL ou MariaDB, 
7. Lancez vos services MySQL/MariaDB, PHP et Apache (ouvrez votre WAMP/MAMP ou lancez vos services LAMP),
8.  Dans votre navigateur, rendez-vous sur la route menant à votre projet, 
9.  Félicitations, vous pouvez maintenant jouer à 49.3 Clicker !

## License et citations

### Citations

Ce projet utilise le projet [Dotenv](https://github.com/vlucas/phpdotenv) créé par Vance Lucas et Graham Campbell :
```
Copyright (c) 2014, Graham Campbell.
Copyright (c) 2013, Vance Lucas.
All rights reserved.
```

Il utilise aussi le design system officiel de l'Etat Français, mis en ligne par le SIG (Système d'information du gouvernement).

Aussi ce projet utilise les icônes mises en ligne par Microsoft sous la licence MIT 
```
Copyright (c) 2020 Microsoft Corporation
```

ainsi que celles de Material de Google.

### License

Cette œuvre est mise à disposition selon les termes de la
[Licence Creative Commons Attribution - Partage dans les Mêmes Conditions 4.0 International](http://creativecommons.org/licenses/by-sa/4.0/).

[![Licence Creative Commons](https://i.creativecommons.org/l/by-sa/4.0/88x31.png)](http://creativecommons.org/licenses/by-sa/4.0/)
