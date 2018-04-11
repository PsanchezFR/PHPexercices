<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" />
        <title>BDD PHP - evaluation association</title>
        	<style>
		body{
			display: flex;
			flex-direction: column;
			align-items: center;
			background: lightblue;
			margin: 0px;
			padding: 0px;
			width: 100vw;
			height: 100vh;
		}
		td, th, tr{
			text-align: center;
			align-self: center;
			align-content: center;
			justify-content: center;
			border: 1px solid black;
		}
        #error{
            text-align: center;
            align-self: center;
            margin: 10px;
            border: 1px solid red;
            color: red;
        }
        #ok{
            text-align: center;
            align-self: center;
            margin: 10px;
            border: 1px solid green;
            color: green;
        }
        #anniversaire{
            text-align: center;
            align-self: center;
            margin: 10px;
            border: 7px inset purple;
            color: purple;
        }
        #jourTriste{
        	text-align: center;
            align-self: center;
            margin: 10px;
            border: 2px dotted red;
            color: red;
        }
        #infosJour{
        	width: 500px;
        	text-align: center;
            align-self: center;
            border: 2px solid black;
            color: black;
        }
        #intitule{
            margin: 10px;
            border: 1px solid grey;
            padding: 2px;
            color: white;
            background-color: grey;
        }
	</style>
    </head>
    <body>
    <?php
    	session_start();

    	//includes
	    	include("manager.php");
	    	include("adherent.php");
	    	include("session.php");
	    	include("activite.php");
	    	include("adherent_has_session.php");
    	//création des managers
	    	$adherentManager = new manager\adherentManager;
	    	$sessionManager = new manager\sessionManager;
	    	$activiteManager = new manager\activiteManager;
	    	$adherent_has_session = new manager\adherent_has_sessionManager;
    	//exécution des méthodes
	    	$adherentManager->checkAnniversaire();
	    	$infosAujourdhui = $adherent_has_session->trouverInfosSessionsJours(NULL, 7); //NULL = aujourd'hui, 7 = jours en plus à récupérer.
    	    //création de l'interface graphique;
            $adherent_has_session->afficherTableau($infosAujourdhui, $activiteManager);

		session_destroy();
    ?>
    </body>

</html>