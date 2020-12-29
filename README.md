# projetConcertSymfony - Symfony 4.4

TP réalisé en LP APIDAE à Montpellier - Site répertoriant des concerts basés sur Montpellier (Comédie)

## Travail à rendre
### Attendus dans le travail à rendre 
- User :
    - accès en lecture aux concerts ✔️
    - accès à la création d’un compte ✔️
    - accès à la page de modification de son compte ✔️
- Réaliser une page d’accueil qui affiche les prochains concerts à venir ✔️
- Administrateur :
    - CRUD concert avec accès aux formulaires de création / update ✔️
    - CRUD groupe avec accès aux formulaires de création / update ✔️
    - CRUD membres avec accès aux formulaires de création / update ❌
- Gestion des accès : un utilisateur n’a pas accès à tout le site, l’administrateur oui ✔️
- Créer un footer qui affiche l’adresse de la salle de concert ✔️❌
    - Modif de la consigne, afficher salle de concert sur la ligne des concerts (tjrs a mtp, on ne peut pas la changer dans même en modifiant)
- Fixtures qui permet de remplir la BDD de façon automatique ✔️
- Quand je clique sur le nom d’un groupe, j’ai la liste de ses membres, mais également une section : « leurs prochains concerts » ✔️


### Nice to have
- Quand l’utilisateur est logué, au lieu de « Login », s’affiche dans la navBar : « Bonjour [nomUserLogué] » ✔️
- Une page qui affiche les concerts passés, classé par année, avec un onglet NavBar dédié ❌
- Upload d’images ❌

![alt text](https://github.com/SebastienBrach/projetConcertSymfony/blob/feature/checklist/tanti.jpg?raw=true)

## Les problèmes (RPZ Juju Tanti)
- Pour être admin, il faut changer le role dans l'entité User (getRoles())
- Soucis lorsque l'on se log (je ne comprends pas l'erreur), il faut rafraichir la page lors de l'affichage de l'erreur pour se connecter
- truc bizarre dans le repository bandController A VOIR
