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
			background: lightblue;
			margin: 0px;
			padding: 0px;
			width: 100vw;
			height: 100vh;
		}
	</style>
    </head>
    <body>
    <?php
    	session_start();
    	
    	include("connexion.php");
    	include("manager.php");
        include("employe.php");
        include("site.php");
        include("incident.php");
        include("affectation.php");

        $employeManage = new manager\employeManager();


		session_destroy();
    ?>
    </body>

</html>