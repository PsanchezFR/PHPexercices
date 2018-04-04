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

				//BDD---------------
				public function fetchAll(){
					$reqCar= $this->bdd->prepare("SELECT * FROM car");
		 			$reqCar->execute();
		 			$result = $reqCar->fetchAll(PDO::FETCH_CLASS, "car");
		 			$this->carList = $result;
				}			

		}	


?>