# What is this project ?

HotelManager is a management web app that allow employees to to manage the reservation of rooms, restaurants, swimming pool, conference room, etc.

# Installation

## 1. Clone project

```bash
https://github.com/EdenSchoolFrance/hotelManagerLyon_2023/tree/main
```
## 2. Install Composer
```bash
composer install
/* Install all dependencies of the /vendor/ folder */
```
```bash
composer dumpt-autoload
/* Load all classes, run this command if you get the error 'require(vendor/autoload.php): failed to open stream' */
```

## 3. Start localhost
### Open a shell in /public/ folder
```bash
PHP -S localhost:8000
/* Or a non used port on your network */
```

## 4. Upload databse
### Import databse 'hotel.sql'


### Usage Information
La balise script présente dans la vue 'option.php' permet de stocker les id des chambres, menus, salles et boissons en chiffrant les données dans localStorage avec encryptStorage.

Je voulais faire un seul form post et pas un envoi à chaque sélection d'option (chambre, salle...)
Donc les options dans une vue séparée en dehors du formulaire (chambre, salle...) ne pouvaient qu'être stockée en front puisque il n y avait pas de table 'commande' en plus de la réservation, empêchant l'insert en bdd les valeurs saisies.

La valeur des options choisies sont stockées en localStorage puis envoyées avec le formulaire.
Pour les options ayant leur vue redirigeant sur une autre page, elles sont stockées en localStorage puis leur valeur est stockée dans in input hidden qui déchiffre les valeurs pour enfin être envoyées avec le form.

## Tâches + estimation du temps
### BDD
- MCD (1h)
- MLD (20 min)
- Créer BDD (1h si créée manuellement, BDD déjà prête pour ce projet donc 0min)

### CRUD CLIENT
- Ajout Client (1h)
- Affichage Client (30min)
- Modification Client (1h)
- Supression Client (1h)

### RÉSERVATION
- Affichage options (chambres, salles, menus, piscine)... (5h)
- Affichage options ne nécésitant pas de vues (bar, restaurant) (3h)
- Insertion réservation (4h)
- Sécurité Session, Cookies, Localstorage (8h)

### Estimation Globale (30h)

J'aurais pu optimiser le code (beaucoup de répétitions, de fonctionnalités pouvant être réalisées autrement). Avec plus de temps j'aurai essayé de mieux faire mais je n'ai pas pris le temps pour ne pas être débordé.

Dans le dossier rendu il y a quelques screenshots du site car je travallais sur un écran plus grand et n'étant pas responsive il y a des images du rendu