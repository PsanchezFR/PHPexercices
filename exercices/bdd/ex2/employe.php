<?PHP
	namespace manager;

	class employeManager extends manager{

		public function __construct($affectationManager){
			parent::__construct();
			$this->affectationManager = $affectationManager;
		}

		// METHODS
		//	
			// OBJECTS
			public function find_employe_by_id($id_employe){

			}

			public function find_employe_by_login($login){

			}

			public function check_connection($login, $password){

			}

			// DATABASE
			public function affect($id_site){

			}

			public function getAllNames(){
				$this->getAll();
				$listeNomsPrenoms = [];

				foreach ($this->listeObjets as $key => $value) {
					$listeNomsPrenoms[] = $value->nom . " " . $value->prenom;
				}

				return $listeNomsPrenoms;
			}

			//	INTERFACE
			public function show_login_interface(){
				echo "<h1>LOGIN EMPLOYES</h1>";
				echo "<form action='index.php' method='post'>";
					echo "<label>LOGIN</br>"; 
						echo "<input type='email' name='login'></input>";
					echo "</label>";

					echo "<label>PASSWORD</br>"; 
						echo "<input type='password' name='password'></input>";
					echo "</label>";

					echo "<input type='submit' value='sign in'>";
				echo "</form>";
			}

			public function show_employe_interface($id_employe){

			}
	}

	namespace objet;

	class employe {}
?>