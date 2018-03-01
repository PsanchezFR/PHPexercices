<?PHP
/**
* Creer un echiquier de 8 cases sur 8 avec une case sur deux colorés en noir
*/
function creerEchiquier($taille, $tailleCases){
	//CHECK DES ARGUMENTS 
	//Si ce ne sont pas des ints, message d'erreur
	if(!is_int($taille) || !is_int($tailleCases)){
		echo "Mauvais format de tailles pour creerEchiquier()";
		return;
	}
	// VARIABLES
		//taille des cases
	$strTailleCases = strval($tailleCases);	//	change la valeur de $tailleCases en string
	$strTailleCases .= "px";				// .= est un opérateur qui sert à ajouter un string à la fin d'un autre

		//couleurs constantes
	$white = "#FFFFFF";
	$grey = "#AAAAAA";
	$black = "#000000";

		//couleurs affectées aux <td> dans le style=""
	$color1 = $white;
	$color2 = $black;

	//OUVERTURE DE LA TABLE
	echo "<table>";

	for ($i=0; $i < $taille ; $i++) { 
		//ECHANGE DES COULEURS ENTRE ELLES À CHAQUE DEBUT DE LIGNE
			if($color1 == $white){
				$color1 = $black;
			}else{
				$color1 = $white;
			}
			if ($color2 == $white) {
				$color2 = $black; 
			}else {
				$color2 = $white;
			}
		//OUVERTURE <TR>
		echo "<tr>";
		for ($j=0; $j < $taille ; $j++) { 
			//CREATION <TD>
			if($j % 2 == 0){
				//SI COLONNE PAIRE -> STYLE AVEC COLOR1
			echo "<td style='height: $strTailleCases; width: $strTailleCases; border: 2px solid $grey; background-color: $color1 '></td>";
			}
			else{
				//SI COLONNE IMPAIRE -> STYLE AVEC COLOR2
				echo "<td style='height: $strTailleCases; width: $strTailleCases; border: 2px solid $grey; background-color: $color2'></td>";
			}
		}
		//FERMETURE <TR>
		echo "</tr>";
	}
	//FERMETURE DE LA TABLE
	echo "</table>";
}


//APPEL DE LA FONCTION
creerEchiquier(8, 150);
?>

<html>
	<body>
	</body>
</html>