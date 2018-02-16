<html lang="fr">
<head>
	<style>
		html{
			height: 100vh;
			width: 100vw;
		}

		body{
			display: flex;
			flex-wrap: wrap;
			flex-direction: row;
			align-items: space-between;
			justify-content: space-between;
		}

		.circle{
			border-radius: 50%;
			height: <?php echo $maxSizeCircle . "px"?>;
			width: <?php echo $maxSizeCircle . "px"?>;
			top: <?php echo $xMaxPositionCircle . "px"?>;
			left:<?php echo $yMaxPositionCircle . "px"?>;
		}

		.square{
			display: flex;
			flex-wrap: nowrap;
			align-items: center;
			justify-content: space-between;
			height: <?php echo $minHeightSquare . "px"?>;
			width: <?php echo $minWidthSquare . "px"?>;
			top:<?php echo $xMaxPositionSquare . "px"?>;
			left:<?php echo $yMaxPositionSquare . "px"?>;
		}
	</style>
</head>
<body>
<?PHP 
/**
* Creer un script permettant de creer plusieurs rectangles de tailles differentes
* et placer y des ronds a l'interieur de couleur differentes.
* Creer un formulaire demandant le nombre de carre ainsi que le nombre de rond par carre.
*/

// VARIABLES USED IN CSS

	//squares
	$xMaxPositionSquare = 0;
	$yMaxPositionSquare = 0;
	$xMaxSizeSquare = 240;
	$yMaxSizeSquare = 240;
	$minWidthSquare = 100;
	$minHeightSquare = 100;
	//circles
	$minSizeCircle = 20;
	$xMaxPositionCircle = $minWidthSquare - $minSizeCircle;
	$yMaxPositionCircle = $minHeightSquare - $minSizeCircle;
	

	$previousColor = [0, 0, 0];

	error_reporting(E_ALL);


function createCircle($x, $y, $size){
	global $previousColor;
	$color = colorCalculus($previousColor);
	echo "<div class='circle' style='top: $x; left: $y; width: $size; height: $size; background-color: rgb($color[0],$color[1],$color[2]);'></div>";
}

function createCirclesContainer($x, $y, $sizeX, $sizeY, $circlesNumber){
	global $previousColor, $xMaxPositionCircle, $yMaxPositionCircle, $minSizeCircle;
	$color = colorCalculus($previousColor);

	echo "<div class='square' style='top: $x; left: $y; width: $sizeX; height: $sizeY; background-color: rgb($color[0],$color[1],$color[2])'>";

	for ($i=0; $i < $circlesNumber; $i++) {
		$currentX = random_int($minSizeCircle, $xMaxPositionCircle);
		$currentY = random_int($minSizeCircle, $yMaxPositionCircle);
		createCircle(
				$currentX, 
				$currentY, 
				random_int($minSizeCircle, max($currentY, $currentX))
			);
	}

	echo "</div>";
}

function generateShapes($squaresNumber, $circlesBySquare){
	global $xMaxPositionSquare, $yMaxPositionSquare, $xMaxSizeSquare, $yMaxSizeSquare, $minWidthSquare, $minHeightSquare, $previousColor;
	//Generation of squares with random positions and sizes
		for ($i=0; $i < $squaresNumber; $i++) { 
			
			createCirclesContainer(
				random_int(0, $xMaxPositionSquare),
			 	random_int(0, $yMaxPositionSquare),
			  	random_int($minWidthSquare, $xMaxSizeSquare),
			  	random_int($minHeightSquare, $yMaxSizeSquare), 
			  	$circlesBySquare
			  	);
		}
	}

	function colorCalculus($previousColor){
			$currentColor = [random_int(0, 255), random_int(0, 255), random_int(0, 255)];
			$colorsDifferenceSumFloor = 254;
			$colorsDifferencesSum = 0;

				//Sum calculus of the difference between Red, Green and Blue.
			while($colorsDifferencesSum < $colorsDifferenceSumFloor){
				for ($j=0; $j < 3; $j++) { 
					$colorsDifferencesSum = abs($currentColor[$j] - $previousColor[$j]); 
				}
				if($colorsDifferencesSum < $colorsDifferenceSumFloor){
					$currentColor = [random_int(0, 255), random_int(0, 255), random_int(0, 255)];
				}
			
			}
			$GLOBALS['previousColor'] = $currentColor;
			return $currentColor;
	}

generateShapes(5, 3);
 ?>
</body>
</html>