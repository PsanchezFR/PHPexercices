<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" />
        <title>BDD PHP - ex1</title>
        	<style>
		body{
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			background: lightblue;
			margin: 0px;
			padding: 0px;
			width: 100vw;
			height: 100vh;
		}
		form{
			width: 25%;
			justify-content: center;
			display: flex;
			flex-direction: column;
			position: relative;
		}
		form>input{
			margin: 5px;
		}
		form>div{
			align-self: center;
		}
		#error{
			margin: 10px;
			border: 1px solid red;
			color: red;
		}
		#embauche{
			margin: 10px;
			border: 1px solid green;
			color: green;
		}
	</style>
    </head>
    <body>
    <?php
    	session_start();

    	include("exception.php");

			echo "<form action='index.php' method='post'>";
				echo "<div>Quel est votre age ?</div>";
				echo "<input type='text' name='age'></input>";
				echo "<input type='submit' name='submit'></input>";
			echo "</form>";
			
			if(!empty($_POST)){
				if(isset($_POST['age'])){
					try{

						if($_POST['age'] < 18){
							throw new adultException("Il n'est pas adulte.");
						}
						elseif($_POST['age'] > 65){
							throw new retraiteException("C'est un retraité.");
						}
						else{
							echo "<div id='embauche'> On l'embauche ! </div>";
						}

					}
					catch(adultException $ex)
					{
						echo "<div id='error'>" . $ex->getMessage() . "<div>";
					}
					catch(retraiteException $ex)
					{
						echo "<div id='error'>" . $ex->getMessage() . "<div>";
					}	
				}
				session_destroy();
			}

    ?>
    </body>

</html>
