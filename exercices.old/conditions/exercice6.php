<?php
/*
* Ecrire un programme qui sort la plus grande valeur du tableau $array
*
*/ 

$array = [12,24,65,85,125,43,56,3];
$largerInt = 0;

foreach ($array as $value) {
	if($value > $largerInt){
		$largerInt = $value;
	}
}

echo "La plus grande valeur est $largerInt.";
