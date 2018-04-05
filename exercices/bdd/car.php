<?php

		class car {

					public $car_id;
					public $brand;
					public $type;
					public $year;
			
		}

		class carsManager extends manager{
			//CONSTRUCTOR
			//
				public function __construct($bdd){
					parent::__construct($bdd);
				}

			//METHODS
			//
				//GETTERS---------------
				public function getCarType($id){
					return $this->getObject($id)->type;
				}
		}	


?>