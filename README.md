# BookStore
Application web - Symfony 5.4


# Présentation du projet
Il s’agit d'une application Symfony 5.4 qui est appelée bookstore. L’application
gèrer quatre entités :
    ● Une entité "Auteur" qui comporte les propriétés suivantes :
         ○ "nom_prenom" qui doit être unique.
         ○ "sexe" qui devra valoir soit M soit F.
         ○ "date_de_naissance" qui devra correspondre à une date valide
         ○ "nationalite" qui devra correspondre à un pays
    ● Une entité "Livre" qui comporte les propriétés suivantes :
         ○ "isbn" : code isbn 13 respectant les critères de validation. Voir explication sur
            wikipédia et les validateurs dans la documentation Symfony.
         ○ "titre" : titre du livre
         ○ "nombre_pages" : nombre de pages du livre (entier strictement positif)
         ○ "date_de_parution" : date de publication
         ○ "note" : entier compris entre 0 et 20
    ● Une entité "Genre" qui comporte la propriété :
         ○ "nom" qui doit être unique
    ● Une entité "User" qui aura des rôles dans la gestion de l’application.

# Relations entre les entités :
  les entités sont associées bidirectionnellement de la manière suivante :
      ● Un auteur peut avoir écrit aucun, un ou plusieurs livres
      ● Un livre est écrit par un ou plusieurs auteurs (un livre doit avoir au moins un auteur).
      ● Un livre peut appartenir à un ou plusieurs genres (un livre doit avoir au moins un genre).
      ● Plusieurs livres peuvent appartenir au même genre
      ● Un genre peut n’être lié à aucun livre

# Contraintes techniques :
   Toutes les opérations d’ajout, de modification et de suppression ne peuvent se faire que par
   un utilisateur authentifié et ayant le rôle "ROLE_ADMIN". Les utilisateurs anonymes auront
   accès en lecture sur toutes les entités sauf "User"

   Actions proposées par l’application :
        ● Lister tous les genres
        ● Ajouter un genre
        ● Lister tous les auteurs
        ● Afficher les détails d’un auteur donné et la liste des livres écrits par cet auteur.
        ● Ajouter un auteur
        ● Modifier un auteur
        ● Supprimer un auteur
        ● lister tous les livres
        ● Afficher les détails d’un livre donné, ses auteurs et les genres auxquels il appartient
        ● Ajouter un livre
        ● Modifier un livre
        ● Supprimer un livre
        ● Lister les livres dont la date de parution est comprise entre deux années données
        ● Augmenter ou diminuer la note d’un livre
        ● Supprimer un genre seulement si aucun livre ne s’y rapporte
        ● Rechercher des livres via une partie de titre

# Contraintes de réalisation :
   ● URL de la base de données : "mysql://root:@127.0.0.1:3306/bookstore"
   ● Utilisation des Fixtures de Doctrine pour ajouter des données de test. Celles-ci doivent être
     générées en utilisant Faker (par exemple):
      ○ 10 genres,
      ○ 20 auteurs,
      ○ 50 livres écrits par un à trois auteurs parmi les auteurs inscrits et appartenant à
        un à trois genres parmi les genres enregistrés. Ces livres sont publiés entre 1900
        et 2021 et ont une note entre 0 et 20
      ○ Un utilisateur ayant le rôle "ROLE_ADMIN"
   ● La page d’accueil présente les livres et permettre de filtrer selon la note, la date de
     publication, l’auteur et le genre.
   ● L’utilisation de framework CSS, font-awesome...
