<?php

/**
* Creer un script qui affiche les tables de multiplications des nombres de 1 a 5
*/
$result = 0;
for ($i=1; $i < 6 ; $i++) { 
	for ($j=1; $j < 11; $j++) { 
		$result = $i * $j;
		echo "$i x $j = $result <br />";
	}
}
?>