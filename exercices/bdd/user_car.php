<?php

		class user_car {

					public $id;
					public $car_id;
					public $user_id;
					public $date;	
		}

		class userCarManager {
			//CONSTRUCTOR
			//
				public function __construct($bdd){
					$this->bdd = $bdd;
					$this->userCarList = [];
				}

			//METHODS
			//
				//GETTERS---------------
				public function getUserCarList(){
					return $this->userCarList;
				}

				//BDD---------------
				public function fetchAll(){
					$reqUserCar= $this->bdd->prepare("SELECT * FROM user_car");
		 			$reqUserCar->execute();
		 			$result = $reqUserCar->fetchAll(PDO::FETCH_CLASS, "user_car");
		 			$this->userCarList = $result;
		 			return $result;
				}			

		}	

?>