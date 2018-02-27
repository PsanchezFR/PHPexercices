<html lang="fr">
<head>
	<?php 
		session_start();
		error_reporting(E_ALL);
	?>
	<style>
		html{
			height: 100vh;
			width: 100vw;
		}

		body{
		}
		.premierFormulaire{
			display: flex;
			flex-direction: row;
		}
		.secondFormulaire{
			display: flex;
			flex-direction: column;
		}
		.masculin{
			background-color: lightblue; 
		}
		.feminin{
			background-color: pink; 
		}
	</style>
</head>
<body>
	<fieldset id="premierFormulaire">
		<form action="exercice10.php" method="post">
			<label>Nom : <input type="text" name="nom"></label>
			<label>Prenom : <input type="text" name="prenom"></label>
			<label>Sexe : <select name="sexe">
				<option>-- sélectionnez --</option>
				<option>Masculin</option>
				<option>Feminin</option>
			</select> </label>
			<label>Nombre de matchs : <input type="text" name="matchs"></label>
			<label><input type="submit" name="submit" value="valider"></label>
		</form>
	</fieldset>

<?PHP 
/**
1)Creer un formulaire avec nom / prenom / sexe / nombre de match.
2)PHP --> créer une fiche. Selon le sexe la fiche est rose ou bleue.
Il faut afficher autant de champs input "points marqués" qu'il y a de matchs.
Mettre les infos en session. 
3)Réafficher les données de la première partie avec le nombre total de points marqués.
*/	
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){	//Si submit
		$sexe = $_POST['sexe'];					//
		echo "<fieldset class='$sexe secondFormulaire'>";
		echo "<form action='exercice10.php' method='post'>";
		foreach ($_POST as $key => $value) {
			if($key != "submit" && $key != "matchs"){
				if(!empty($value))
					$_SESSION[$key] = $value;
				echo "<div>";
				echo $key . ": " . $_SESSION[$key];
				echo "</div>";
				
			}
			else if($key == "matchs"){
				for ($i=0; $i < intval($_POST["matchs"]) ; $i++) { 
					echo "<label>Resultat du match " . $i . " : <input type='text' name='match[]'></label>";
					$_SESSION[$key] = $_POST[$key];
				}
				echo "<label><input type='submit' name='matchResult' value='envoyer resultats'></label>";
			}
		}
		echo "</fieldset>";
		echo "</form>";

		echo "<fieldset class='troisiemeFormulaire'>";
		foreach ($_POST as $key => $value) {
			if($key == "match[]"){
				if(!empty($value))
				{
					$_SESSION[$key] = $value;
					$_SESSION[$key] = $_POST[$key];
					echo "<div>";
					echo "Hello";
					echo "<div>";
				}
			}
		}

		echo "</fieldset>";
	}
 ?>
</body>
</html>