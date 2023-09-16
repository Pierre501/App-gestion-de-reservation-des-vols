# App-gestion-de-reservation-des-vols
# Voici tous les étapes que vous devriez suivre pour que cette application fonctionne parfaitement.

# Pré-requis
Vous devez installer un éditeur de code sur votre ordinateur.
Vous devez installer un serveur web sur votre ordinateur (ex:xampp,...).
Vous devez installer composer sur votre ordinateur.

# Premièrement
Vous devez executé les commande ci-dessous:
composer install
cp env.example .env

# Deuxièment
Créer un base de données sur votre ordinateur.
Dans le fichier .env : spécifier le nom de votre base de donnée (ex: DB_DATABASE=nom_de_votre_base_de_donnée)

# Troisièment
Vous devez executé les commande ci-dessous:
php artisan migrate

# Quatrièment
Il y a un fichier script_sql.sql dans le répertoire database/script_sql/script_sql.sql.
Et après ouvrer cet fichier et execute les script dans votre base de donnée.

# Cinquièment
Executé le commande => "php artisan serve" pour lancé l'application en local

# Sixièment 
Il y a 2 types d'utilisateurs:
=>Administrateur:
  -Nom d'utlistauer=>andrianarivo24@gmail.com
  -Mot de passe=>andrianarivo24@gmail.com

=>Utilisateur: 
  -Nom d'utlistauer=>nomenjanahary@gmail.com
  -Mot de passe=>nomenjanahary@gmail.com

 
