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
        $employeManager = new manager\employeManager();
        $siteManager = new manager\siteManager();
        $incidentManager = new manager\incidentManager();

        $affectationManager->creer_dependance("employeManager", $employeManager);
        $affectationManager->creer_dependance("siteManager", $siteManager);

        $employeManager->show_login_interface();
        //$affectationManager->creer_interface_affectation();

		session_destroy();
    ?>
    </body>

</html>