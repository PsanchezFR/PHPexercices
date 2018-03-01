<?php

/**
 * Ecrire un script qui calcul la somme des entiers de 1 a 20
 * et afficher le resultat
 */
function intSum1to20(){
	$result = 0;
	for ($i=1; $i <= 20 ; $i++) { 
		$string .= "$i + ";
		$result += $i;
	}
	  trim($string, "+ ");
	  $string .= " = $result";
	  return $string;
}

echo intSum1to20();
?>