<?php

/**
* Afficher le nombre pair de 1 à 20 avec :
* for
* until
* while
*/
echo "FOR : <br />";
for($i = 0;$i <= 20; $i++){
	if($i % 2 == 0){
		echo "$i <br />";
	}
}

echo "WHILE : <br />";
$i1 = 0;
while($i1 <= 20){
	$i1++;
	if($i1 % 2 == 0){
		echo "$i1 <br />";
	}
}
?>