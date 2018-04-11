<?PHP
	namespace manager;

	class manager {

		//// VARIABLES GLOBALES
		//
			static $bdd = NULL;	// stocke UNE SEULE connexion pour la classe ET les classes enfants.

		//// CONSTRUCT
		//
			public function __construct(){
				$this->listeObjets = [];

				//Récupérer le nom de l'objet à partir du nom du manager. Utile pour cibler la bonne table.
				$this->nomObjet = stripslashes(get_class($this));
				$this->nomObjet = str_replace("manager", "", $this->nomObjet);
				$this->nomObjet = str_replace("Manager", "", $this->nomObjet);

				//Si la connexion n'existe pas à l'instanciation du premier manager, la créer.
				if(self::$bdd == NULL){
					self::$bdd = self::creerConnexion("evalAssociation");
				}
			}
		//// METHODES
		//
			//PUBLIQUES

			// Fonction pour retrouver toutes les entrées de la table et les stocker dans des objets.
			// retourne une liste d'objets de la classe $this->listeObjets (soit la racine "objet" dans "objetManager");
			// ----------
			// $ordonné = bool ; détermine si l'on ressort les résultats dans le désordre ou pas. 
			public function getAll($ordonné = false){
						//Stockage de strings dans des variables plus explicites
						$nomColonneId = "id" . $this->nomObjet;
						$nomNamespaceObjets = "objet\\";	// double antislash = antislash simple dans des double-quote.
						//Prépare la requête pour tout sélectionner 
						if($ordonné){
							$reqObjet = self::$bdd->prepare("SELECT * FROM $this->nomObjet ORDER BY $nomColonneId ASC");
						}
						else{
							$reqObjet = self::$bdd->prepare("SELECT * FROM $this->nomObjet");
						}
						//Exécute la requête
			 			$reqObjet->execute();
			 			//Parcourt les résultats de la requête un par un et les stocke dans un objet de la classe "nomObjet".
			 			//Chaque objet (le résultat) est stocké dans la liste locale "this->listeObjets"
			 			$resultat = $reqObjet->fetchAll(\PDO::FETCH_CLASS,  $nomNamespaceObjets. $this->nomObjet);
			 			$this->listeObjets = $resultat;
					}	

			//STATIQUES

				// Fonction pour créer une connexion à une base de donnée.
				// Le login, et mot de passe sont entrés en dur.
				// -------------
				// $nomBDD(string) est le nom de la base de donnée à laquelle se connecter.	
			static function creerConnexion($nomBDD){
				try{
					// antislash avant PDO à cause du namespace global
					$bdd = new \PDO('mysql:host=localhost;dbname='.$nomBDD.';charset=utf8', 'root', '150389ps');
					$bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
					return $bdd;
				}
				catch(\PDOException $e){
					echo "<div id=error>Connexion non établie : " . $e->getMessage(). "</div>";
				}
			}		
	}
?>