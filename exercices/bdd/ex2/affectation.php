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
			public function creer_interface_affectation(){
				echo "<form action='index.php' method='post'>";
		            echo "<div>";

		                echo "<select name='employe'>";
		                	$listeDeNomsEtPrenoms = $this->recuperer_dependance(employeManager)->getAllColumns(['prenom', 'nom']);
		                    foreach ($listeDeNomsEtPrenoms as $key => $value) {
		                        $id= $key+1;
		                        echo "<option value='$id'>$value</option>";
		                    }
		                echo "</select>";

		                echo "<select name='site'>";
		                	$listeDeNoms = $this->recuperer_dependance(siteManager)->getAllColumns(['ville', 'nom', 'CP']);
		                    foreach ($listeDeNoms as $key => $value) {
		                        $id= $key+1;
		                        echo "<option value='$id'>$value</option>";
		                    }
		                echo "</select>";

		            echo "</div>";
		            echo "<input type='submit' value='Affecter !'>";
		        echo "</form>";

		        if(isset($_POST))
		        {
		            if(isset($_POST['employe']) && isset($_POST['site']))
		            {
		                $this->add($_POST['employe'], $_POST['site']);
		            }
		        }
			}
	}

	namespace objet;

	class affectation {}
?>