<?php
/**
* Completez ce code source pour que le script affiche
*
*   $num est pair OU $num est impair
*
*   Vous n'avez pas le droit d'utiliser la fonction if, il faut utiliser
*   la fonction switch.
* 
* 
*   Rappel: l'operateur permettant de connaitre le reste d'une division est %
*/
$num1 = rand(0, 100);

if(!isset($num1)) {
	die("Vous devez appeler le script de cette facon : <br /><br /><strong>http://localhost:8080/exercices/conditions/exercice_5.php?num=4</strong>");
}

echo "$num1 <br />";

switch($num1 % 2 == 0)
{
	case 0:
	echo '$num1 est impair.';
	break;

	case 1:
	echo '$num1 est pair.';
	break;

	default:
        echo 'nope.';
}



/*
* Completez le code ici
*/
