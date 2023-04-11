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

### Usage Information
La balise script présente dans la vue 'option.php' permet de stocker les id des chambres, menus, salles et boissons en chiffrant les données dans localStorage avec encryptStorage.

Je voulais faire un seul form post et pas un envoi à chaque sélection d'option (chambre, salle...)
Donc les options dans une vue séparée en dehors du formulaire (chambre, salle...) ne pouvaient qu'être stockée en front puisque il n y avait pas de table 'commande' en plus de la réservation, empêchant l'insert en bdd les valeurs saisies.

La valeur des options choisies sont stockées en localStorage puis envoyées avec le formulaire.
Pour les options ayant leur vue redirigeant sur une autre page, elles sont stockées en localStorage puis leur valeur est stockée dans in input hidden qui déchiffre les valeurs pour enfin être envoyées avec le form.
