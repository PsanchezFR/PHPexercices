<?php
/**
* Completez ce code source pour que le script affiche
*
*   $numX est le plus grand des trois nombres
*
*/
$num1 = rand(0, 100);
$num2 = rand(0, 100);
$num3 = rand(0, 100);

if(!isset($num1) || !isset($num2) || !isset($num3)) {
	die("Vous devez appeler le script de cette facon : <br /><br /><strong>http://localhost:8080/exercices/conditions/exercice_4.php?num1=4&num2=3&num3=12</strong>");
}

echo '$num1 : '."$num1 <br />";
echo '$num2 : '."$num2 <br />";
echo '$num3 : '."$num3 <br /> <br />";

if($num1 != $num2 )
{
	if($num1 > $num2){
		echo '$num1 est le plus grand nombre.';
	}
	else{
		if ($num2 > $num3){
			echo '$num2 est le plus grand nombre.';
		}
		else {
			echo '$num3 est le plus grand nombre.';
		}
	}
}
else{
	if($num1 != $num3){
		if($num1 > $num3)
		{
			echo '$num1 est le plus grand nombre.';
		}
		else{
			echo '$num3 est le plus grand nombre.';
		}
	}
	else{
		echo '$num1 == $num2 == $num3';
	}
}


/*
* Completez le code ici
*/
