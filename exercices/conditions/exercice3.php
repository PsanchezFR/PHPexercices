<?php
/**
* Completez ce code source pour que le script affiche si un nombre est pair ou impair
*
*   $nombre est pair
*   OU
*   $nombre  est impair
*
*/
$nombre = rand(0, 100);
echo "$nombre <br />";
if(is_null($nombre)) {
	die("Vous devez appeler le script de cette facon : <br /><br /><strong>http://localhost:8080/php/conditions/exercice_3.php?nombre=100</strong>");
}

if($nombre % 2 == 0)
{
	echo 'nombre pair';
}
else
{
	echo 'nombre impair';
}

/*
* Completez le code ici
*
* AIDE :
* L'operateur modulo "%" permet de connaitre le reste d'une division
*/

