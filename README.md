# Recette_Lyon_MVC_A2

pour le projet pensait à installer xampp : https://www.apachefriends.org/fr/index.html

et composer : https://getcomposer.org/download/

lancez

-Apache
-MySQL
prenez le fichier hotel_manager.sql dans le dossier bdd

cliquer sur admin a coté de MySQL et importer la bdd dans Php my admin

penser à changer nom a la ligne 8 du src/config/config.php si vous l'avez pas appelé comme moi

puis meter les autres fichier dans le htdocs dans xampp (il est à la racine du disque normalement)

dans le fichier lancer la console et faite

-$ composer install

ensuit aller dans le dossier public lancer la console et faite

-php -S localhost:8000

chose faite

-crud client
-reservation salle
-reservation piscine
-reservation bar
-reservation chambre
-reservation restaurant
-test unitaire

chose pas faite

-stystem de back office (salle,piscine,bar,chambre,restaurant)
-login register