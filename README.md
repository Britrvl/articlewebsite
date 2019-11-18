# articlewebsite
Projet SQL/PHP Site d'articles :: __VROOM__

## propositions d'emplois
* pages PHP :couple_with_heart_woman_woman:
- [ ] "logout.php" déconnexion utilisateur ($_SESSION)
- [ ] "user_infos.php" informations utilisateurs eye_candy
- [ ] "index.php" qui propose les deux derniers articles et un message de coucou
- [ ] "articles.php" qui affiche juste tous les articles

* intégrations :man_juggling:
- [ ] faire le "part/menu.php" à intégrer ensuite en #include sur toutes les pages .php
- [ ] fusionner le code bootcrap avec les pages php backend pour que ce soit impressionnant
- [ ] désactiver les liens devenus inutiles dans "part/menu.php" quand on est loggé (<?=;>)

* si c'est fini et que l'on est trop fort :business_suit_levitating:
- [ ] activation de compte par email SMTP
- [ ] reset password de compte par email SMTP
- [ ] moteur de recherche des articles (copy/paste "ex22-form_searchengine")

* pour s'occuper :man_facepalming:
- [ ] faire le clone de wordpress

### tit's soucis

* pulseaudio, what da hell
* désactive les journaux systemctl
* samba 192.168.2.10 ? test déjà ton propre ip.
* clock win-dos recule d'une heure
* récupérer anciens favoris, nettoyer historique sur windos
* logout :: comportement espace taff -> verrouillage
* installation petit serveur simple SMTP

## consigne

Projet PHP procédural :

    Le but est de créer un petit site de gestion et d'affichage d'articles.

    Ce site devra être travaillé par groupes et devra être versionné sur un dépôt github partagé avec le formateur. GIT EST OBLIGATOIRE.

    Le front devra être travaillé le minimum possible, utilisation de bootstrap 4 obligatoire. METTEZ L'ACCENT SUR LE BACKEND !

    1) Créer une nouvelle base de données avec le nom de votre site qui devra comprendre deux tables : Une table "users" et une table "articles". (Le schéma MCD devra être présent sur le dépôt GIT)

    2) Créer le système d'authentification du site qui devra comprendre :
        - Une page d'inscription
        - Une page de connexion
        - Une page de déconnexion
        - Une page de profil (affichage des infos personnelles de la personne connectée)

    3) Créer les pages qui serviront à voir la liste des articles et voir un article en entier (son titre, son contenu, auteur, etc...)

    4) La page d'accueil devra afficher les deux derniers articles parus sur le site en version raccourcis.

    /// BONUS À FAIRE SEULEMENT QUAND TOUT LE RESTE EST FAIT ET VALIDÉ PAR LE FORMATEUR ///

    5) Faire un système d'activation de compte par email à l'inscription

    6) Faire un système de réinitialisation de mot de passe par email

    7) Créer une page avec un moteur de recherche des articles

    8) Faire un backoffice de gestion des articles/users (créer, supprimer, etc...)