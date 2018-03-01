Le but de ce mini projet est de faire un jeu de scrabble automatique.
Un dictionnaire au format texte vous permettra de verifier que le mot existe, nous accepterons
que les mots de ce fichier (tans pis pour les autres).

- Créer un formulaire demandant le nombre de joueur et afficher un bouton "suivant"
- Une fois le boutton "suivant" renseigné, demander le nom des joueurs.
- Il faut que le nom des joueurs soit sauvegarder en session pour pouvoir les reutiliser après.
- Créer un bouton "Commencer le jeu"


- Une fois le boutton commencer le jeu valider créer une interface de scrabble :
- Créer un bouton: "Tirer des lettres" qui tire 8 lettres au hazard dans l'alphabet
- Afficher ces lettres sur la page HTML.
- Créer un champs texte dans lequel vous allez entrer le mot et un bouton "jouer"
- Lorsqu'on clique sur le bouton "jouer" il faut verifier que le mot existe dans le fichier texte 
et afficher le nombre de point que le joueur vient de remporter ou un message s'il n'a pas de point.
- Passer ensuite au joueur suivant et recommencer le procédé 5 fois par joueur.


- Une fois les 5 parties par joueurs jouées, afficher un recapitulatif du jeu :
  * Pour chaque joueur
     - Afficher les mots ainsi que le nombre de point pour chaque mot
     - Afficher le nombre de point total.
  * Classer les joueurs du premier au dernier.

* Aide :
Tableau des points par lettre:
    $points = [ "A"	=> 1, "B"	=> 3, "C"	=> 3, "D"	=> 2, "E"	=> 1, "F"	=> 4, "G"	=> 2, "H"	=> 4,"I"	=> 1, "J"	=> 8, "K"	=> 10, "L"	=> 1, "M"	=> 2, "N"	=> 1, "O"	=> 1, "P"	=> 3, "Q"	=> 8, "R"	=> 1, "S"	=> 1, "T"	=> 1, "U"	=> 1, "V"	=> 4, "W"	=> 10, "X"	=> 10, "Y" =>	10];

* Créer les classes

- joueur (information sur le joueur)
- partie (information sur les parties)
- scrabble (permet de verifier les mots)
 