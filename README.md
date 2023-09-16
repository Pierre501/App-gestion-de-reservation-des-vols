# App-gestion-de-reservation-des-vols
Étapes pour faire fonctionner cette application correctement :

# Pré-requis :
1. Installez un éditeur de code sur votre ordinateur.
2. Installez un serveur web sur votre ordinateur (ex : XAMPP, ...).
3. Installez Composer sur votre ordinateur.

# Premièrement :
1. Exécutez les commandes suivantes :
2. composer install
3. cp env.example .env

# Deuxièmement :
1. Créez une base de données sur votre ordinateur.
2. Dans le fichier .env, spécifiez le nom de votre base de données (ex : DB_DATABASE=nom_de_votre_base_de_donnee).

# Troisièmement :
1. Exécutez la commande suivante :
2. php artisan migrate
   
 
# Quatrièmement :
1. Il y a un fichier script_sql.sql dans le répertoire database/script_sql/script_sql.sql. Ouvrez ce fichier et exécutez les scripts dans votre base de données.

# Cinquièmement :
1. Exécutez la commande `php artisan serve` pour lancer l'application en local.

# Sixièmement :
Il y a deux types d'utilisateurs :

Administrateur :
- Nom d'utilisateur : andrianarivo24@gmail.com
- Mot de passe : andrianarivo24@gmail.com

Utilisateur :
- Nom d'utilisateur : nomenjanahary@gmail.com
- Mot de passe : nomenjanahary@gmail.com

Lien vers le dépôt GitHub de l'application : [https://github.com/Pierre501/App-gestion-de-reservation-des-vols](https://github.com/Pierre501/App-gestion-de-reservation-des-vols)
