<?php
	 namespace exception;

	 class constraintException extends \Exception {
	 	public function throwAssignationError(){
	 		if(!isempty($message) && is_string($message)){
	 			return $message;
	 		}
	 		else{
	 			return "Affectation déjà existante ! Essayez une autre combinaison !";
	 		}
	 	}
	 }
?>