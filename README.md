# BookStore
Application web - Symfony 5.4

![bookstore](https://user-images.githubusercontent.com/63150702/148683887-2332001c-3688-4634-a39f-f060864a8e3a.PNG)

# Présentation du projet
Il s’agit d'une application Symfony 5.4 qui est appelée bookstore.  <br />L’application
gèrer quatre entités : <br />
    ● Une entité "Auteur" qui comporte les propriétés suivantes : <br />
          "nom_prenom" qui doit être unique. <br />
          "sexe" qui devra valoir soit M soit F. <br />
          "date_de_naissance" qui devra correspondre à une date valide <br />
          "nationalite" qui devra correspondre à un pays <br />
    ● Une entité "Livre" qui comporte les propriétés suivantes : <br />
          "isbn" : code isbn 13 respectant les critères de validation. Voir explication sur <br />
            wikipédia et les validateurs dans la documentation Symfony.
          "titre" : titre du livre <br />
          "nombre_pages" : nombre de pages du livre (entier strictement positif) <br />
          "date_de_parution" : date de publication <br />
          "note" : entier compris entre 0 et 20 <br />
    ● Une entité "Genre" qui comporte la propriété : <br />
          "nom" qui doit être unique <br />
    ● Une entité "User" qui aura des rôles dans la gestion de l’application.

# Relations entre les entités :
  les entités sont associées bidirectionnellement de la manière suivante : <br />
      ● Un auteur peut avoir écrit aucun, un ou plusieurs livres <br />
      ● Un livre est écrit par un ou plusieurs auteurs (un livre doit avoir au moins un auteur). <br />
      ● Un livre peut appartenir à un ou plusieurs genres (un livre doit avoir au moins un genre). <br />
      ● Plusieurs livres peuvent appartenir au même genre <br />
      ● Un genre peut n’être lié à aucun livre <br />

# Contraintes techniques :
   Toutes les opérations d’ajout, de modification et de suppression ne peuvent se faire que par
   un utilisateur authentifié et ayant le rôle "ROLE_ADMIN". Les utilisateurs anonymes auront
   accès en lecture sur toutes les entités sauf "User" <br />

   Actions proposées par l’application : <br />
        ● Lister tous les genres <br />
        ● Ajouter un genre <br />
        ● Lister tous les auteurs <br />
        ● Afficher les détails d’un auteur donné et la liste des livres écrits par cet auteur. <br />
        ● Ajouter un auteur <br />
        ● Modifier un auteur <br />
        ● Supprimer un auteur <br />
        ● lister tous les livres <br />
        ● Afficher les détails d’un livre donné, ses auteurs et les genres auxquels il appartient <br />
        ● Ajouter un livre <br />
        ● Modifier un livre <br />
        ● Supprimer un livre <br />
        ● Lister les livres dont la date de parution est comprise entre deux années données <br />
        ● Augmenter ou diminuer la note d’un livre <br />
        ● Supprimer un genre seulement si aucun livre ne s’y rapporte <br />
        ● Rechercher des livres via une partie de titre <br />

# Contraintes de réalisation :
   ● URL de la base de données : "mysql://root:@127.0.0.1:3306/bookstore" <br />
   ● Utilisation des Fixtures de Doctrine pour ajouter des données de test. Celles-ci doivent être
     générées en utilisant Faker (par exemple): <br />
      ○ 10 genres, <br />
      ○ 20 auteurs, <br />
      ○ 50 livres écrits par un à trois auteurs parmi les auteurs inscrits et appartenant à
        un à trois genres parmi les genres enregistrés. Ces livres sont publiés entre 1900
        et 2021 et ont une note entre 0 et 20 <br />
      ○ Un utilisateur ayant le rôle "ROLE_ADMIN" <br />
   ● La page d’accueil présente les livres et permettre de filtrer selon la note, la date de
     publication, l’auteur et le genre. <br />
   ● L’utilisation de framework CSS, font-awesome...
