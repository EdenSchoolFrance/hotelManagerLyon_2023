# Project Hotel

## Bonjour et bien venu !

    Bien venu sur mon projet Hotel, ce site permet d'aider les hotels dans leurs gestions.
    Vous pourrez dans ce site:
            - faire des enregistrements de client dans la base de donnée (ainsi que voir l'historique de ce qu'ils ont: commandés, fait, etc ..)

## Pour lancer le projet il vous faut installer:

    - Xampp (ou une autre application du même style)
    - Composer
    - Node

Allez avec l'explorateur de fichier là où vous voulez installer le projet, et landez un terminal dans celui-ci.

    - Etape 1: Faites la commande `git clone https://github.com/EdenSchoolFrance/hotelManagerLyon_2023.git`.

    - Etape 2: copier et coller la commande suivante: `git checkout Lucas`,
        puis une fois l'installation terminée faites pareil mais avec la commande:  `git pull`

    - Etape 3: Lancez Xammp (Apache et MySQL)

    - Etape 4: Installez la base de donnée (lancez en admin MySQL, appuyez sur 'Nouvelle base de données', mettez le nom 'hotel_manager', puis importez le fichier qui se trouve dans le dossier BDD et voilà l'installation de la base de donnée est fini !).

    - Etape 5: Mettez dans le terminal la commande 'composer init' (faites la touche entrée jusqu'à ce que les options soit fini), Puis tapez la commande 'composer install' enfin allez dans le fichier composer!;json pour changer la ligne 5 par `"Hotel\\": "src/"`. Enfin tapez la commande 'composer dump-autoload'.

    - Etape 6: Pour la dernière étape, retournez dans le terminal puis entrez la commande 'cd .\public\'.
                Et pour lancer le projet faites la commande dans le même terminal: 'php -S localhost:8000'.

## Et vous voici dans le projet !!
