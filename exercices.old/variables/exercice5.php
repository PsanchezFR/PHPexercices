<?php
/**
* Creer un formulaire qui demande le name de l'utilisateur
* une fois envoyé
* afficher le name et demander le firstName
* enfin afficher le name ET le firstName aprés la validation 
*
* Indice : il faut utiliser les sessions
*/
if (!isset($_SESSION)) { 
	session_start(); 
}

if ($_POST["reset"]) {
	session_unset();
}

if(!empty($_POST)) 
{
	if(empty($_SESSION["name"])) 
	{
		$_SESSION["name"] = $_POST["mainField"];
	} 
	else if (empty($_SESSION["firstName"]))
	{
		$_SESSION["firstName"] = $_POST["mainField"];
	}
}

if(!isset($_SESSION["name"]) && !isset($_SESSION["firstName"]))
{
	echo ("Write your last name in the field : " . "<br />");
}

if(isset($_SESSION["name"]) && !isset($_SESSION["firstName"]))
{
	echo ("Write your first name in the field : " . "<br />");
}

if(isset($_SESSION["name"]) && isset($_SESSION["firstName"]))
{
	echo ("Here is what you typed : " . "<br />" . $_SESSION["name"] . " " . $_SESSION["firstName"]);
	
}

?>

<html>
	<body>
		<form action="exercice5.php" method="post">
			<label>Write in this field : <br />
				<input type="text" name="mainField"><br />
			</label>
			<button name="reset" value="RESET!">RESET!</button> 
			<input type="submit" name="submit" value="submit!">
		</form>
	</body>
</html>
