<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" />
        <title>BDD PHP - ex1</title>
        	<style>
		body{
			justify-content: center;
			background: lightblue;
			margin: 0px;
			padding: 0px;
			width: 100vw;
			height: 100vh;
		}
		form{
			position: relative;
		}
		form>input {
			position: absolute;
			left: 47.5vw;
		}
		form div{
			display: flex;
			flex-direction:row;
			justify-content: center;
		}

		ul{
			border: 1px solid gray;
			border-radius: 5%;
			margin: 15px;
			padding: 50px;
		}
		table{
			margin-top: 10%;
			margin-left: 40%;
		}
		table tr, table th{
			border: 1px solid black;
		}
	</style>
    </head>
    <body>
    <?php

    	include("connexion.php"); 
    	include("user.php"); 
    	include("car.php");
    	include("user_car.php");

    		$usersManager = new usersManager($bdd);
    		$carsManager = new carsManager($bdd);
    		$userCarManager = new userCarManager($bdd);

			$usersManager->fetchAll();
			$carsManager->fetchAll();
			$userCarManager->fetchAll();

			echo "<form action='index.php' method='post'>";
				echo "<div>";
					echo "<ul>";
						foreach ($usersManager->getUserList() as $key => $object) {
							echo "<li>";
							echo "<input type='radio' name='user'>$object->firstname $object->lastname</input>";
							echo "</li>";
						}
					echo "</ul>";

					echo "<ul>";
						foreach ($carsManager->getCarList() as $key => $object) {
							echo "<li>";
							echo "<input type='radio' name='car'>$object->brand $object->type</input>";
							echo "</li>";
						}
					echo "</ul>";
				echo "</div>";
				echo "<input type='submit' name='submit'></input>";
			echo "</form>";

			echo "<table>";
			echo "<tr>";
				echo "<th>ID</th>";
				echo "<th>USER ID</th>";
				echo "<th>CAR ID</th>";
				echo "<th>DATE</th>";
			echo "</tr>";
					foreach ($userCarManager->getUserCarList() as $key => $object) {
						echo "<tr>";
							echo "<th>$object->id</th>";
							echo "<th>$object->user_id</th>";
							echo "<th>$object->car_id</th>";
							echo "<th>$object->date</th>";
						echo "<tr>";
					}
			echo "</table>";

			// foreach ($carsManager->getCarList() as $key => $object) {
			// 	echo "<pre>";
			// 	echo $object->brand;
			// 	echo "</pre>";
			// }

			// foreach ($userCarManager->getUserCarList() as $key => $object) {
			// 	echo "<pre>";
			// 	echo $object->date;
			// 	echo "</pre>";
			// }

    ?>
    </body>

</html>
