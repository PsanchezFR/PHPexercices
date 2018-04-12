<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" />
        <title>BDD PHP - ex2</title>
        	<style>
		body{
			display: flex;
			flex-direction: column;
			justify-content: center;
            align-items: center;
			background: lightblue;
			margin: 0px;
			padding: 0px;
			width: 100vw;
			height: 100vh;
		}
        form{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 5px;
            padding: 5px;
            border: 6px inset gray;
        }
        select{
            margin: 5px;
        }
        label{
            margin: 5px;
        }
        #error{
            text-align: : center;
            margin: 5px;
            padding: 5px;
            color: red;
            border: 4px outset darkred;
        }
	</style>
    </head>
    <body>
    <?php
    	session_start();
    	
    	include("connexion.php");
        include("exceptions.php");
    	include("manager.php");
        include("employe.php");
        include("site.php");
        include("incident.php");
        include("affectation.php");

        $affectationManager = new manager\affectationManager();
        $employeManager = new manager\employeManager($affectationManager);
        $siteManager = new manager\siteManager();
        $incidentManager = new manager\incidentManager();

        echo "<form action='index.php' method='post'>";
            echo "<div>";

                echo "<select name='employe'>";
                    foreach ($employeManager->getAllNames() as $key => $value) {
                        $id= $key+1;
                        echo "<option value='$id'>$value</option>";
                    }
                echo "</select>";

                echo "<select name='site'>";
                    foreach ($siteManager->getAllNames() as $key => $value) {
                        $id= $key+1;
                        echo "<option value='$id'>$value</option>";
                    }
                echo "</select>";

            echo "</div>";
            echo "<input type='submit' value='Affecter !'>";
        echo "</form>";

        if(isset($_POST))
        {
            if(isset($_POST['employe']) && isset($_POST['site']))
            {
                $affectationManager->add($_POST['employe'], $_POST['site']);
            }
        }

		session_destroy();
    ?>
    </body>

</html>