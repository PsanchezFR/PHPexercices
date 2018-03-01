<?php

/**
*
* Créer un formulaire qui demande un login et un mot de passe
* puis une fois le formulaire validé, afficher :
* 
* - Le login
* - Le mot de passe
* - L'adresse ip du client
*/

if(isset($_POST["login"], $_POST["password"])) //isset($login) && isset($password)
{
	echo($_POST["login"] . "<br />");
	echo($_POST["password"] . "<br />");
	echo($_SERVER['REMOTE_ADDR'] . "<br />");
}
?>

<html>
	<body>
		<form action="exercice1.php" method="post">
			<label>Login: <br />
				<input type="text" name="login"><br />
			</label>
			<label>Password: <br />
				<input type='text' name='password'>
			</label>
			<input type="submit">
		</form>
	</body>
</html>


