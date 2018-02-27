<style>
		html{
			height: 100vh;
			width: 100vw;
		}

		body{
		}
		.premierFormulaire{
			display: flex;
			flex-direction: column;
		}
		.error{
			position: relative;
			text-align: center;
			height: 20px;
			width: 150px;
			background-color: black;
			color: red;
			border: 2px solid red;
		}
	</style>

<?php
/**
 * Jeux de sorciers et guerriers
 * 
 * Le but du jeu est de créer des "Personnage" qui vont se battre
 * Ces "Personnage" sont des "guerriers" et des "sorciers"
 * 
 * Le "sorcier" peut "ensorceller" un autre "personnage"
 * Lors d'une attaque de sorcier l'autre "personnage" perd 10 points de vie
 * 
 * Le "guerrier" peut "attaquer" un autre "personnage"
 * Lors d'une attaque de guerrier l'autre "personnage" perd 15 points de vie
 * 
 * 
 * Faire un formulaire qui demande le nombre de sorciers et le nombre de guerriers
 * Demander le nombre de point de vie et le  nom de chaque personnage
 * 
 * 
 * Créer autant de personnage qu'indiqué dans le formulaire, parametrer leurs noms et point de vie
 * et faite les se battre.
 * 
 * Le jeu s'arrete quand il ne reste plus qu'un personnage.
 * 
 * */

// CLASSE PERSONNAGE
class Personnage {
	public function __construct($hp, $name){
		$this->hp = $hp;
		$this->name = $name;
	}

	public function __destruct(){
	}

	private function setHP($newHp){
		$this->hp = $newHp;
	}

	public function heal($healValue){
		$newHp = $this->hp + $healValue;
		$this->setHP($newHp);
	}

	public function hurt($hurtValue){
		$newHp = $this->hp - $hurtValue;
		$this->setHP($newHp);
	}

	public function testDeath(){
		if($this->hp <= 0){
			echo "Le personnage " . $this->name . " est mort. </br>";
			return true;
		}
		else{
			echo "Le personnage " . $this->name . " a encore " . $this->hp . " hp. </br>";
			return false;
		}
	}
}

// CLASSES SORCIER ET GUERRIER
class Sorcier extends Personnage {
	public function __construct($hp, $name){
		parent::__construct($hp, $name);
	}

	public function ensorceller($personnage){
		$personnage-> hurt(10);
	}
}

class Guerrier extends Personnage {
	public function __construct($hp, $name){
		parent::__construct($hp, $name);
	}

	public function attaquer($personnage){
		$personnage-> hurt(15);
	}
}

function lancerAttaque($attaquant, $defenseur){
	if(get_class($attaquant) == "Sorcier"){
		$attaquant-> ensorceller($defenseur);
	}
	else if(get_class($attaquant) == "Guerrier"){
		$attaquant-> attaquer($defenseur);
	}
}

function lancerFight($combattants){
		while(count($combattants)>1){
			echo "</br> Il reste " . count($combattants) . " combattants.</br>";
				echo "============================== </br>";
			$keys = array_keys($combattants);
			do{
			$index1 = $keys[rand(0, count($keys)-1)];
			$index2 = $keys[rand(0, count($keys)-1)];
			}while ($index1 === $index2);

					if($combattants[$index2]-> testDeath()){
						unset($combattants[$index2]);
						continue;
					}else{
						lancerAttaque($combattants[$index1], $combattants[$index2]);
					}

					if($combattants[$index1]-> testDeath()){
						unset($combattants[$index1]);
						continue;
					}else{
						lancerAttaque($combattants[$index2], $combattants[$index1]);
					}		
		}
}

function peuplerPersonnages($nombreSorciers, $nombreGuerriers){
	$combattants = [];
	for ($i=0; $i < $nombreSorciers; $i++) { 
		$name = "sorcier" . $i;
		$combattants[] = new Sorcier(rand(10,30),$name);
	}
	for ($i=0; $i < $nombreGuerriers; $i++) { 
		$name = "guerrier" . $i;
		$combattants[] = new Guerrier(rand(10,50),$name);
	}
	shuffle($combattants);
	lancerFight($combattants);
}

// PARTIE FORMULAIRE
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$error = false;
	foreach ($_POST as $key => $value) {
		if($key == "sorciers" || $key == "guerriers"){
			if(ctype_digit($value) && $value >= 0){
				${$key} = $value;
			}
			else{
				echo "<div class='error'>BAD VALUES !</div>";
				$error = true;
				break;
			}
		}
	}
	if(!$error){
		peuplerPersonnages($sorciers, $guerriers);
	}
}
?>

<fieldset>
	<form action="exercice2.php" method="post" class="premierFormulaire">
		<label>Nombre de Sorciers:<input type='text' name='sorciers'></label>
		<label>Nombre de Guerriers<input type='text' name='guerriers'></label>
		<label><input type='submit' name='submit' value='FIGHT!'></label>
	</form>
 </fieldset>