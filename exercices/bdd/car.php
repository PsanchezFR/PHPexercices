<?php

		class car {

					public $car_id;
					public $brand;
					public $type;
					public $year;
			
		}

		class carsManager {
			//CONSTRUCTOR
			//
				public function __construct($bdd){
					$this->bdd = $bdd;
					$this->carList = [];
				}

			//METHODS
			//
				//GETTERS---------------
				public function getCarList(){
					return $this->carList;
				}

				public function getCar($id){
					foreach ($this->carList as $key => $car) {
						if($car->car_id === $id){
							return $car;
						}
					}
				}

				public function getCarType($id){
					return $this->getCar($id)->type;
				}

				//BDD---------------
				public function fetchAll(){
					$reqCar= $this->bdd->prepare("SELECT * FROM car");
		 			$reqCar->execute();
		 			$result = $reqCar->fetchAll(PDO::FETCH_CLASS, "car");
		 			$this->carList = $result;
				}			

		}	


?>