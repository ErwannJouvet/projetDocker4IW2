# Projet Docker 4IW2
Projet de fin de semestre Docker.

# Groupe N°8
- DA SILVA SOUSA Pedro (PedroDSS)
- JOUVET Erwann (ErwannJouvet)

# Comment lancer le docker compose
docker compose build (--no-cache si besoin) \
docker compose up (-d si pas d'interaction)

# Comment lancer les deux docker compose séparée
docker compose -f docker-compose-symfony.yml -f docker-compose-postgres.yml build \
docker compose -f docker-compose-symfony.yml -f docker-compose-postgres.yml up

# Initialiser le projet une fois build
docker compose exec symfony composer create-project symfony/skeleton . \
docker compose exec symfony composer require symfony/maker-bundle --dev \
docker compose exec symfony composer require symfony/orm-pack \
docker compose exec symfony make:entity : \
    1. name : Todo
    2. title : string
    3. done : boolean  
Deplacer le fichier BaseTodoController.php a la racine dans le dossier src/src/Controller & le renommer en TodoController.php \

Aller au lien suivant : http://localhost:8000/todos