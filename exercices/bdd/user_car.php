<?php

		class user_car {

					public $id;
					public $car_id;
					public $user_id;
					public $date;	
		}

		class userCarManager extends manager{
			//CONSTRUCTOR
			//
				public function __construct($bdd){
					parent::__construct($bdd);
				}

			//METHODS
			//
				//BDD---------------

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