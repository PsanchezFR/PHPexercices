<?PHP
	namespace manager;

	class manager {

		static $bdd = NULL;

		public function __construct(){
			$this->listeObjets = [];
			$this->listeDependance = [];

			$this->nomObjet = stripslashes(get_class($this));
			$this->nomObjet = str_replace("manager", "", $this->nomObjet);
			$this->nomObjet = str_replace("Manager", "", $this->nomObjet);

			if(self::$bdd == NULL){
				self::$bdd = self::creerConnexion();
			}
		}

		public function getAll(){
					$reqObjet = self::$bdd->prepare("SELECT * FROM $this->nomObjet ORDER BY id ASC");
		 			$reqObjet->execute();
		 			$resultat = $reqObjet->fetchAll(\PDO::FETCH_CLASS, 'objet\\' . $this->nomObjet);
		 			$this->listeObjets = $resultat;
				}	

		public function getAllColumns($columnNamesArray){
				$this->getAll();
				$listeDansTable = [];
				
				foreach ($this->listeObjets as $key => $objet) {
					$listeDansLigne = [];
					foreach ($columnNamesArray as $key => $nomColonne) {
						$listeDansLigne[] = $objet->$nomColonne;
					}

					$listeDansTable[] = implode(", ", $listeDansLigne);
				}
				return $listeDansTable;
			}		

		static function creerConnexion(){
			try{
				$bdd = new \PDO('mysql:host=localhost;dbname=simplonSecurite;charset=utf8', 'root', '150389ps');
				$bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
				return $bdd;
			}
			catch(\PDOException $e){
				echo "Connexion non établie : " . $e->getMessage();
			}
		}		

		public function creer_dependance($nomClef, $objectDependance){
			$this->listeDependance[$nomClef] = $objectDependance;
		}

		public function recuperer_dependance($nomClef){
			return $this->listeDependance[$nomClef];
		}
	}
?>