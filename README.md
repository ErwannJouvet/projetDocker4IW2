# Projet Docker 4IW2

Projet de fin de semestre Docker.

# Groupe N°8

- DA SILVA SOUSA Pedro (PedroDSS)
- JOUVET Erwann (ErwannJouvet)

# Comment lancer le docker compose

docker compose build (--no-cache si besoin) 
docker compose up (-d si pas d'interaction)

# Comment lancer les deux docker compose séparée
Il faut être certains que les networks utilisés existent. \
docker network create star (pas obligatoire car interne)
docker network create platinum (obligatoire car externe)

docker compose -f docker-compose-symfony.yml -f docker-compose-postgres.yml build 
docker compose -f docker-compose-symfony.yml -f docker-compose-postgres.yml up

# Initialiser le projet première fois (image et docker-compose seulement)
Docker client : \
se placer dans le dossier /var/www/html \
rm -rf public \
docker compose exec symfony composer create-project symfony/skeleton . \
docker compose exec symfony composer require symfony/maker-bundle --dev \
docker compose exec symfony composer require symfony/orm-pack \
docker compose exec symfony bin/console make:entity : \
    1. name : Todo \
    2. title : string \
    3. done : boolean  
Deplacer le fichier TodoController.php a la racine dans le dossier ./src/src/Controller \

Modifier le .env et rajouter : DATABASE_URL=postgresql://${POSTGRES_USER:-postgres}:${POSTGRES_PASSWORD:-mydatabasepassword}@postgresql:5432/${POSTGRES_DB:-symfony_db}?serverVersion=${POSTGRES_VERSION:-15.6} \
Pour la connexion avec la base de donnée.

Aller au lien suivant : http://localhost:8000/todos

# Images

Adminer : pedrodss/custom-adminer:v1.0 \
Composer : pedrodss/custom-composer:v1.0 \
Postgresql : pedrodss/custom-postgresql:v1.0 \
Symfony : pedrodss/custom-symfony:v1.0 \

# Accès à la DB via Adminer

Système : PostgreSQL \
Serveur : postgresql \
Utilisateur : postgres \
Mot de passe : mydatabasepassword \
Base de données : symfony_db \

# Attention

### En cas d'erreur du cache executer la commande suivante :

docker compose exec symfony bin/console cache:clear
