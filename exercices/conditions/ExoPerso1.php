<?php
$a = rand(0, 35);


	echo "$a <br />";

if($a < 10)
{
	echo '$a est inférieure à 10';
}
else if ($a < 20)
{
	echo '$a est entre 10 et 20';
}
else{
	echo '$a est supérieure à 20';
}

// Autre solution :
// $a <10 
// $a > 10 && $a < 20


 if($a > 30 || $a < 5)
 {
 	echo '<br /> Valeur extrême !';
 }



?>