<?php
		
		class user {
					public $id;
					public $firstname;
					public $lastname;
					public $login;
					public $password;		
		}

		class usersManager {
			//CONSTRUCTOR
			//
				public function __construct($bdd){
					$this->bdd = $bdd;
					$this->userList = [];
				}

			//METHODS
			//
				//GETTERS---------------
				public function getUserList(){
					return $this->userList;
				}

				public function getUser($id){
					foreach ($this->userList as $key => $user) {
						if($user->id === $id){
							return $user;
						}
					}
				}

				public function getUserName($id){
					return $this->getUser($id)->firstname;
				}

				//BDD---------------
				public function fetchAll(){
					$reqUser = $this->bdd->prepare("SELECT * FROM user");
		 			$reqUser->execute();
		 			$result = $reqUser->fetchAll(PDO::FETCH_CLASS, "user");
		 			$this->userList = $result;
				}			

		}	
		
?>