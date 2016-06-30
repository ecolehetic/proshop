
#Guide D'installation

### Récuperation du projet
	git clone https://github.com/ecolehetic/proshop-site.git
### Installation du projet
	composer install
	php app/console doctrine:create:database
	php app/console doctrine:schema:update --force
	php app/console assets:install
	
### Créer votre compte SUPER_ADMIN
	php app/console fos:user:create --super-admin

### Lancer le serveur symfony
	php app/console server:start

## Annexes :
### Recupération des données de production
(Nous vous fournissons la base de donnée de prod pour avoir du contenu)

