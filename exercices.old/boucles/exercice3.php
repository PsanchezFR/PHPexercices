<?php

/**
* Afficher les entiers du tableau $data
*/

$data = [4,3.2,"nico","formation",5,3.14,8];

foreach ($data as $key => $value) {
	if(is_int($value)){
		echo "$value est un entier à la position $key du tableau. <br />";
	}
}
?>
