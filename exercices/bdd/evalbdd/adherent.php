<?php 
	namespace manager;

	class adherentManager extends manager {

		public function checkAnniversaire(){
			//Par défault l'on considère qu'il n'y a pas d'anniversaire
			$jourTriste = true;

			//fetch des informations des adhérents
			$this->getALl();

			//boucle pour tester s'il y a un anniversaire aujourd'hui et afficher un message
			//approprié
			foreach ($this->listeObjets as $key => $value) {
				if(isset($value->dateNaissance)){
					if($value->dateNaissance == date("Y-m-j"))
					{
						echo "<div id='anniversaire'>Bon anniversaire " . $value->prenom . " " . $value->nom ."!</div>";
						$jourTriste = false;
					}  
				}
			}
			// s'il n'y a pas d'anniversaire alors afficher :
			if($jourTriste){
				echo "<div id='jourTriste'>Il n'y a pas d'anniversaire à souhaiter :(</div>";
			}
		}
	}

	namespace objet;

	class adherent{}
?>