<?php 
	namespace manager;

	class adherent_has_sessionManager extends manager {

		// Cette fonction retourne une liste d'objets PDOStatement (comme fetch);
		//	Elle permet de trouver des informations dans le BDD pour une plage de jours.
		// ----------------------
		// $date(date("Y-m-j")) est la date à partir de laquelle on calcule;
		//	$interval(int) est le nombre de jours à récupérer après $date;
			public function trouverInfosSessionsJours($date = NULL, $interval = 0){
				//initilisation des variables
				$listeResultats = [];
				if($date == NULL){
					$dateAjd = date("Y-m-j");
				}
				else{
					$dateAjd = $date;
				}
				//requête PDO
				$reqSessions = self::$bdd->prepare("
						SELECT `session`.date, $this->nomObjet.adherent_idadherent, `session`.idsession, adherent.nom, adherent.prenom
						FROM $this->nomObjet
						INNER JOIN `session` 
						ON `session`.idsession = $this->nomObjet.session_idsession
						INNER JOIN adherent 
						ON adherent.idadherent = $this->nomObjet.adherent_idadherent
						WHERE `session`.date BETWEEN CURDATE() AND CURDATE() + $interval
						ORDER BY `session`.idsession, adherent.nom, adherent.prenom, `session`.date ASC
					");
				$reqSessions->bindParam(1, $dateAjd, \PDO::PARAM_STR, 45);
				$reqSessions->execute();
				// boucle pour stocker les résultats dans une liste
				while($resultat = $reqSessions->fetch(\PDO::FETCH_NUM)){
					$listeResultats[] = $resultat;
				}

				return $listeResultats;
				
			}

		// Cette fonction affiche un tableau des valeurs fournies;
		// ELle est à utiliser avec le résultat de $this->trouverInfosSessionsJours();
		//	Elle permet de trouver des informations dans le BDD pour une plage de jours.
		// ----------------------
		// $infosJours(array) est la liste des PDOStatement ;
		//	$interval(int) est le nombre de jours à récupérer après $date;
			public function afficherTableau($infosJours, $activiteManager){
				echo "<h1>COURS À VENIR</h1>";
				echo "<table id='infosJour'>";
					echo "<tr>";
						echo "<th>DATE</th>";
						echo "<th>ID UTILISATEUR</th>";
						echo "<th>ID SESSION</th>";
						echo "<th>NOM</th>";
						echo "<th>PRENOM</th>";
					echo "</tr>";
					foreach ($infosJours as $key => $value) {
						echo "<tr>";
							/* si c'est la première ligne, on utilise l'id -1
							 il n'existe pas et une ligne d'intitulé de cours sera créé.
							 Le reste du temps on utilise l'id de la ligne précédente 
							pour tester s'il y a changement de cours.*/
							if($key > 0){
								$IdSessionPrecedenteLigne = $infosJours[($key-1)][2];
							}
							else{
								$IdSessionPrecedenteLigne = -1;
								$nomCours = $activiteManager->trouverNomCours(intval($value[2]));	
							}

							// création de la ligne d'intitulé de cours si l'id de cours a changé entre la ligne précédente
							//	et celle-ci
							if(isset($nomCours) && $IdSessionPrecedenteLigne != $value[2]){
								echo "<tr><td id=intitule>INTITULE DU COURS : </td><td id=intitule>$nomCours[0]</td> </tr>";
							}

							// réinitialisation du nom du cours
							$nomCours[0] = ""; 

							// boucle pour afficher les valeurs et cal
							for ($i=0; $i < count($value); $i++) { 

								echo"<td>$value[$i]</td>";	
								
							}
							// Stockage du nom du cours. Les calculs se font pour la prochaine ligne ($key+1)
							// d'où le placement en fin de boucle.
							if($key < count($infosJours)-1){
								$index = intval($infosJours[$key+1][2]);
								$nomCours = $activiteManager->trouverNomCours($index);	
							}
						echo "</tr>";

					}
				echo "</table>";
			}
	}

	namespace objet;

	class adherent_has_session{}
?>