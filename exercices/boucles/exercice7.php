<?PHP
/**
* Afficher les multiples de 5 sans faire de multiplication Le faire avec for
* Le faire avec for
* Le faire avec while
*
*
*/
function multiples5($limite,$mode){
	if(is_int($limite) && $limite > 5){
		if(is_string($mode)){

			$result = "";

			if($mode == "for"){
				$result .= "mode : for ; ";
				for ($i=5; $i < $limite; $i+=5) { 
					$result.= "$i, ";
				}
			}
			else if($mode == "while"){
				$result .= "mode : while ; ";
				while($j < $limite){
					$result .= "$j, ";
					$j += 5;
				}
			}
			else{
				return "INCORRECT MODE, PLEASE SPECIFY while OR for.";
			}
		}
		else{
			return "INCORRECT MODE, PLEASE SPECIFY while OR for.";
		}

		trim($result, ", ");
		return $result;
	}
}

echo multiples5(100, "for");
?>