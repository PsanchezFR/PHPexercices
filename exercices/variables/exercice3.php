<?php
/**
* Inserer le tableau $insert dans $number aprés le 3eme element
* puis afficher le resultat
* 
* Info : pour afficher un tableau utiliser la fonction var_dump()
* http://php.net/manual/fr/ref.array.php
*/



$number = [1,2,3,4];
$insert = ["A","B","C"];

for ($i=0; $i < count($insert); $i++) { 
	array_push($number, $insert[$i]);
}

print_r(array_values($number));
echo("<br />");
echo ("lenght : " . count($number));
?>


<html>
	<body>
		
	</body>
</html>