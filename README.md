# Phoenix

### Installation

Cloner le projet en local

```script
git clone https://github.com/EdenSchoolFrance/hotelManagerLyon_2023.git
```

### Installer les modules

```script
installation de npm : npm install
installation de composer : composer install
lancement des tests unitaires : ./vendor/bin/phpunit tests
```

_dependancies_

- encrypt-storage
- sass
- phpunit

### Lancer le projet

```script
aller dans le dossier public est exécuter
php -S localhost:[port]
```

##### Information complémentaire

Projet utilisé avec sase, phpUnit en MVC

Test unitaire tests/ManagerTest.php

Aucune modification BDD

Utilisation de Javascript, localStorage

### Tâches + estimation du temps

_bdd_

- MCD Non création
- MLD Non création
- Importation de la BDD (5min)

_back, front_

- Font-end général (10h)
- Back-end général (30h)

_formulaire_

- ajout de client (1h) total
- supression de client (1h) total
- modification de client (1h) total

_reservation_

- ajout des différentes options (10h)

_plus_

Gestion d’erreur (4h)
Test Unitaire (3h)
Vérification Front-end / back-end (3h)

#### Comment marche le projet ?

##### Gestion du client

Pour l'ajout d'un client cliquer sur addClient dans l'entête de la page puis rentrer les informations

Pour la supression d'un client Allert dans ShowClient dans l'entête de la page puis sur update sur le client souhaité

Pour la supression du client aller sur ShowClient puis delete

##### Ajout d'une reservation

Aller sur reservation dans show client sur le client souhaité puis cliqué sur les formes de cercles (champs radio) puis un lien s'affichera cliquer dessus séléctionner l'option voulu et entrer la date correspondante.

Puis cliquer sur Envoyer

###### Temps total

Total: 23 H 40 min
Soit ≈ 6 jours
