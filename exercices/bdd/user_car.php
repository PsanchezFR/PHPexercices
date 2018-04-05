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
					$reqUserCar= $this->bdd->prepare("SELECT * FROM user_car ORDER BY user_car.id DESC");
		 			$reqUserCar->execute();
		 			$result = $reqUserCar->fetchAll(PDO::FETCH_CLASS, "user_car");
		 			$this->userCarList = $result;
		 			return $result;
				}

				public function insertOne($car_id, $user_id, $date){
					try{
						$reqUserCar= $this->bdd->prepare("INSERT INTO user_car (id, car_id, user_id, date) VALUES (NULL,?,?,?)");
						$reqUserCar->bindParam(1, $car_id, PDO::PARAM_INT);
						$reqUserCar->bindParam(2, $user_id, PDO::PARAM_INT);
						$reqUserCar->bindParam(3, $date, PDO::PARAM_INT);
			 			$reqUserCar->execute();
		 			}
		 			catch(Exception $ex){
		 				echo $ex;
		 			}
				}			

		}	

?>