<?PHP
	namespace manager;

	class affectationManager extends manager{

		// METHODS
		//	
			// DATABASE
			public function add($id_employe, $id_site){
				$bdd = self::$bdd;
				$results = NULL;
				try{
					$requeteAddAffectation = $bdd->prepare("
						INSERT INTO affectation (site_id, employe_id, `date`)
						VALUES (?,?,?)
						");
					$requeteAddAffectation->bindParam(1,$id_site, \PDO::PARAM_INT);
					$requeteAddAffectation->bindParam(2,$id_employe,\PDO::PARAM_INT);
					$requeteAddAffectation->bindValue(3,date("Y-m-d"), \PDO::PARAM_STR);
					 $results = $requeteAddAffectation->execute();

				}
				catch(\Exception $e){
					echo "<div id='error'>Affectation impossible, êtes-vous sûr qu'elle n'existe pas déjà ?</div>";
				}
			}

			// INTERFACE

	}

	namespace objet;

	class affectation {}
?>