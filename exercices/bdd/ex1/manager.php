<?php
		class manager {
			//CONSTRUCTOR
			//
				public function __construct($bdd){
					$this->bdd = $bdd;
					$this->objectList = [];
				}

			//METHODS
			//
				//GETTERS---------------
				public function getObjectList(){
					return $this->objectList;
				}

				public function getObject($id){
					foreach ($this->objectList as $key => $object) {
						if($object->id === $id){
							return $object;
						}
					}
				}

				//BDD---------------
				public function fetchAll($tableName){
					$classname = $tableName;
					$reqUser = $this->bdd->prepare("SELECT * FROM $tableName ORDER BY id DESC");
		 			$reqUser->execute();
		 			$result = $reqUser->fetchAll(PDO::FETCH_CLASS, "$classname");
		 			$this->objectList = $result;
				}			

		}	

?>