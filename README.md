# Oxynum Project

## Pré-requis 

- Un serveur Web
- PHP
- Composer
- Node
- MySQL/MariaDB


## Installation du projet

### Base de données :  

- Executer le fichier SQL contenu dans le dossier `conception/Database`

### Partie Back-End :

- Copier le contenu du dossier `project/back` à l'emplacement souhaité dans le serveur web
- Faire un `composer update` dans le dossier `project/back`
- Dans le dossier `project/back/app`, faire une copie du fichier `config.ini.dist` puis le renommer en `config.ini`
- Remplir ce fichier avec les informations nécessaires pour la connexion avec la base de données

### Partie Front-End :

- Faire un `npm install` dans le dossier `project/front`
- Dans le dossier `project`, copier le fichier `.env.dist` et renommer en `.env`
- Renseigner la base URL du fichier, en pointant vers le dossier `back/public` (dans lequel se trouve `index.php`)
- Faire la commande : `parcel build index.html` 
- Copier le contenu du dossier `dist` sur le serveur web


## Comment utiliser l'application

- Créer un compte utilisateur
- Se connecter avec vos idenfiants
- Vous pouvez naviguer librement grâce au menu
- Pour se déconnecter, il suffit d'accéder au menu et cliquer sur "se déconnecter"