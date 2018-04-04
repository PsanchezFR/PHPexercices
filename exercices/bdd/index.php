<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" />
        <title>Placement aléatoire</title>
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

			foreach ($usersManager->getUserList() as $key => $value) {
				echo "<pre>";
				echo $value->firstname;
				echo "</pre>";
			}

			foreach ($carsManager->getCarList() as $key => $value) {
				echo "<pre>";
				echo $value->brand;
				echo "</pre>";
			}

			foreach ($userCarManager->getUserCarList() as $key => $value) {
				echo "<pre>";
				echo $value->date;
				echo "</pre>";
			}

    ?>
    </body>

</html>
