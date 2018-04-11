<?php
	if(isset($_POST)){
		try{
			$bdd = new PDO('mysql:host=localhost;dbname=simplon_php', "root", "", array(PDO::ERRMODE_EXCEPTION => true));
			echo "<div id='ok'>OK<div>";
		}
		catch(PDOException $e){
			echo "<div id='error'>NOK<div>";
			echo $e->getMessage();
		}
	}
?>