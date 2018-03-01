<?php

/**
* Créer un script qui compte le nombre de voyelle
* dans la variable $sentence
*
*/

$sentence = "Bonjour c'est moi!";

$vowels = array('a','e','i','o','u','y');

$vowelNb = 0;


// array_intersect pourrait marcher aussi.
foreach (str_split($sentence) as $value) {
	foreach ($vowels as $value1) {

		if ($value == $value1) {
			echo "$value ";
			$vowelNb++;
		}
	}
}

echo "<br />Le nombre de voyelles dans la phrase est : $vowelNb.";

?>