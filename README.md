Pour pouvoir faire fonctionner ce projet,

Il faut avoir :

Composer : pour la gestion des dépendance

PHP Version 8. au minimum

Symfony CLI :pour le lancement du server (facultatif)

Pour l'installation:

lancer cette ligne de commande pour gérer les dépendance du projet : "composer install".

puis vous avez 2 choix pour la base de donnée

    1 - j'ai mis une copie de ma base de donnée durant le test dans la racine de ce projet et vous pouvez l'utiliser en l'important juste dans votre gestionnaire de base de donnée .

    2 - vous pourrez générer la base de donnée en utilisant les ligne de commandes suivant

    --- php bin/console doctrine:database:create //pour générer la base de donnée

    --- php bin/console doctrine:migration:migrate // pour faire la migration

Au lancement du serveur, vous serez inviter a entrer les informations nécéssaire pour l'authentification qui est gérer par le User  Providers (fournisseur d'utilisateurs) "user_in_memory" pour la sécurisation de notre application.

le login sera 'admin' et le mot de passe sera 'adminpassword'.

Pour exposer notre produit à l'aide de GraphQL, j'ai utiliser API PLATEFORM , et on a comme interface le GraphiQL consultable sur le lien :

"127.0.0.1:8000/api/graphql" et on peut aussi utiliser un API REST sur le lien "127.0.0.1:8000/api".

exemple d'un requete graphql a executer sur l'interface GraphiQL:


{
  produits {
    	edges {
      		node {
        		Nom
       			Quantite
        		Prix
      		}

    }
  }
}
