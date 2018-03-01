<?php

/**
* Créer des classes Dog et et Cat étendant Pet et implémentant l'interadce Animal
* 
* Methode de Animal : 
*   - Cry() // Affiche le nom du crie de l'animal
*   - Run() // Affiche la vitesse a laquelle l'animal court
* Propriété de Animal :
*    - $speed
*    - $cryName
* 
* Methode de Pet
*   - Sleep() // Affiche le temps d'une sieste d'un animal
* Proprieté de Pet
*   - SleepTime
*
* Il faut passer les paramètres $sleepTime, $speed, $cryName dans le constructeur
* 
* 
* Créer ensuite 3 chats et 2 chiens, les mettres dans un tableau
* Parcourir le tableau et afficher soit le cri, la vitesse ou son temps de sieste.
*/

interface Animal{
	public function cry();
	public function run();
	public function getSpeed();
}

// PARENT CLASS PET
class Pet implements Animal{
	public function __construct($SleepTime, $speed, $cryName){
		$this->sleepTime = $SleepTime;
		$this->speed = $speed;
		$this->cryName = $cryName;
	}

	public function Sleep(){
		echo "ZzzZZzZz";
		echo "The animal slept " . $this->sleepTime . " hours.";
	}

	public function getSpeed(){
		echo $this->speed;
	}

	public function cry(){
		echo $this->cryName;
	}

	public function run(){
		echo "The animal runs to " . $this->speed;
	}
}

// CHILDREN CLASSES CAT AND DOG
class Dog extends Pet{

	public function __construct($SleepTime, $speed, $cryName) {
        parent::__construct($SleepTime, $speed, $cryName);
    }

    public function __construct1() {
		$this->speed = 35;
		$this->SleepTime = 8;
		$this->cryName = "bark";
        parent::__construct($this->SleepTime, $this->speed, $this->cryName);
    }
}

class Cat extends Pet{
	public function __construct($SleepTime, $speed, $cryName) {
        parent::__construct($SleepTime, $speed, $cryName);
    }

	public function __construct1() {
		$this->speed = 12;
		$this->SleepTime = 24;
		$this->cryName = "meow";
        parent::__construct($this->SleepTime, $this->speed, $this->cryName);
    }
}

// CODE TO CREATE INSTANCES OF OBJECTS
$dogArray = [];
for ($i=0; $i < 4 ; $i++) { 
	${"dog" . $i} = new Dog(8, 35, "bark");
	array_push($dogArray, ${"dog" . $i});
}

$catArray = [];
for ($i=0; $i < 3 ; $i++) { 
	${"cat" . $i} = new Cat(24, 12, "meow");
	$catArray[] = ${"cat" . $i};
}

foreach ($dogArray as $key => $value) {
 	$value -> run();
}