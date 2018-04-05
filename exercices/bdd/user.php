<?php
		
		class user {
					public $id;
					public $firstname;
					public $lastname;
					public $login;
					public $password;		
		}

		class usersManager extends manager {
			//CONSTRUCTOR
			//
				public function __construct($bdd){
					 parent::__construct($bdd);
				}

			//METHODS
			//
				//GETTERS---------------
				public function getUserName($id){
					return $this->getObject($id)->firstname;
				}
		}	
		
?>