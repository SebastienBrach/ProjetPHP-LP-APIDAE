# projetConcertSymfony - Symfony 4.4

TP réalisé en Licence Pro APIDAE à Montpellier

# Travail à rendre
### Attendus dans le travail à rendre 
- User :
    - accès en lecture aux concerts ✔️
    - accès à la création d’un compte ✔️
    - accès à la page de modification de son compte ✔️
- Réaliser une page d’accueil qui affiche les prochains concerts à venir ✔️
- Administrateur :
    - CRUD concert avec accès aux formulaires de création / update ✔️
    - CRUD groupe avec accès aux formulaires de création / update ✔️
    - CRUD membres avec accès aux formulaires de création / update ✔️
- Gestion des accès : un utilisateur n’a pas accès à tout le site, l’administrateur oui ✔️
- Créer un footer qui affiche l’adresse de la salle de concert ✔️
- Fixtures qui permet de remplir la BDD de façon automatique ✔️
- Quand je clique sur le nom d’un groupe, j’ai la liste de ses membres, mais également une section : « leurs prochains concerts » ✔️


### Nice to have
- Quand l’utilisateur est logué, au lieu de « Login », s’affiche dans la navBar : « Bonjour [nomUserLogué] » ✔️
- Une page qui affiche les concerts passés, classé par année, avec un onglet NavBar dédié ✔️
- Upload d’images ✔️
- Insérer une pagination sur les concerts à venir en page d’accueil ✔️




- Site de concert basé sur Montpellier (Comédie)

- Les problèmes (RPZ Juju Tanti)
    - Pour être admin, il faut changer le role dans l'entité User (getRoles())

    - Soucis lorsque l'on se log (je ne comprends pas l'erreur), il faut rafraichir la page lors de l'affichage de l'erreur pour se connecter
    - truc bizarre dans le repository bandController A VOIR


Modif de la consigne, afficher salle de concert sur la ligne des concerts (tjrs a mtp, on ne peut pas la changer dans même en modifiant (j'aurais effectivement pu rajouter le fait de changer l'adresse, mais il ne m'a pas sembler que cela soit intéressant))