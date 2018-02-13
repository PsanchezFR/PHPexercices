<?PHP
/**
* Creer un echiquier de 8 cases sur 8 avec une case sur deux colorés en noir
*/
function creerEchiquier($taille){
	if(!is_int($taille)){
		echo "Mauvais format de tailles pour creerEchiquier()";
		return;
	}
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
			echo "<td style='height: 30px; width: 30px; border: 2px solid $grey; background-color: $color1 '></td>";
			}
			else{
				echo "<td style='height: 30px; width: 30px; border: 2px solid $grey; background-color: $color2'></td>";
			}
		}
		echo "</tr>";
	}
	echo "</table>";
}

creerEchiquier(25);
?>

<html>
	<body>
	</body>
</html>