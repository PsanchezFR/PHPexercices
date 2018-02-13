<?PHP
/**
* Creer un echiquier de 8 cases sur 8 avec une case sur deux colorés en noir
*/
function creerEchiquier($taille, $tailleCases){
	if(!is_int($taille) || !is_int($tailleCases)){
		echo "Mauvais format de tailles pour creerEchiquier()";
		return;
	}
	$strTailleCases = strval($tailleCases);
	$strTailleCases .= "px";
	echo "<table>";
	$white = "#FFFFFF";
	$grey = "#AAAAAA";
	$black = "#000000";
	$color1 = $white;
	$color2 = $black;
	for ($i=0; $i < $taille ; $i++) { 
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
		echo "<tr>";
		for ($j=0; $j < $taille ; $j++) { 
			if($j % 2 == 0){
			echo "<td style='height: $strTailleCases; width: $strTailleCases; border: 2px solid $grey; background-color: $color1 '></td>";
			}
			else{
				echo "<td style='height: $strTailleCases; width: $strTailleCases; border: 2px solid $grey; background-color: $color2'></td>";
			}
		}
		echo "</tr>";
	}
	echo "</table>";
}

creerEchiquier(8, 50);
?>

<html>
	<body>
	</body>
</html>