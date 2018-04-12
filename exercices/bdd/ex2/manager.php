<?PHP
	namespace manager;

	class manager {

		static $bdd = NULL;

		public function __construct(){
			$this->listeObjets = [];

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

	}
?>