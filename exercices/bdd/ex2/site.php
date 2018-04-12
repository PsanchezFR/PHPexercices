<?PHP
	namespace manager;

	class siteManager extends manager{


		public function getAllNames(){
				$this->getAll();
				$listeSites = [];

				foreach ($this->listeObjets as $key => $value) {
					$listeSites[] = $value->nom . " " . $value->ville;
				}

				return $listeSites;
			}


	}

	namespace objet;

	class site {}
?>