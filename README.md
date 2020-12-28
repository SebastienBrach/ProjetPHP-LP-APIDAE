# projetConcertSymfony
Symfony 4.4

- Site de concert basé sur Montpellier (salle à la Comédie)

- Les problèmes (RPZ Juju Tanti)
    - Pour être admin, il faut changer le role dans l'entité User (getRoles())

    - Soucis lorsque l'on se log (je ne comprends pas l'erreur), il faut rafraichir la page lors de l'affichage de l'erreur pour se connecter
    - truc bizarre dans le repository bandController A VOIR


Modif de la consigne, afficher salle de concert sur la ligne des concerts (tjrs a mtp, on ne peut pas la changer dans même en modifiant (j'aurais effectivement pu rajouter le fait de changer l'adresse, mais il ne m'a pas sembler que cela soit intéressant))


Attendus :
- Administrateur :✔️
    CRUD membres avec accès aux formulaires de création / update

Nice to have
- Une page qui affiche les concerts passés, classé par année, avec un onglet NavBar dédié.
- Upload d’images