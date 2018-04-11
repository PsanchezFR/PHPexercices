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
        form{
            display: flex;
            flex-direction: column;
            align-self: center;
            justify-content: center;
            width: 20vw;
            height: 100vh;
        }
        input{
            width: 100%;
        }
        label{
            margin: 10px
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
	</style>
    </head>
    <body>
    <?php
    	session_start();
    	

            echo "<form action='index.php' method='post'>";
                echo "<label>LOGIN:<input type='text' name='login'></input></label>";
                echo "<label>PASSWORD:<input type='text' name='password'></input></label>";
                echo "<input type='submit' name='submit'></input>";

                include("connexion.php"); 

            echo "</form>";

		session_destroy();
    ?>
    </body>

</html>