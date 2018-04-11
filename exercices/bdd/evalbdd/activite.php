<?php

	namespace manager;

	class activiteManager extends manager {
		// Fonction qui sert à trouver le nom d'un cours à partir de son id
		// Elle retourne le premier objet PDOStatement trouvé par la requête.
		// --------------------
		// $id(int) est l'id du cours à rechercher.
		public function trouverNomCours($id){
			$reqActivite = self::$bdd->prepare("
					SELECT $this->nomObjet.nom
					FROM $this->nomObjet 
					WHERE activite.idactivite = ?
				");

			$reqActivite->bindParam(1, $id, \PDO::PARAM_STR, 45);
			$reqActivite->execute();
			return $reqActivite->fetch(\PDO::FETCH_NUM);
		}
	}

	namespace objet;

	class activite{}


	
?>