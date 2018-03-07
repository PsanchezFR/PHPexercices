<style>
	body{
		display: flex;
		flex-direction:column;
		background: lightblue;
	}
	body div{
		margin: 10px;
	}
	h1, h2{
		align-self: center;
	}
	h2{
		font-size: 1em;
	}
	form{
		display: flex;
		background:silver;
		margin: 5px;
		flex-flow:column;
		flex-wrap: nowrap;
		justify-content:center;
		align-content: center;
		height: 325px;
		width: 325px;
		border: 2px solid black;
		border-radius: 10%;
	}
	form div{
		display: flex;
		flex-flow: row;
		align-self: center;
		align-content: space-around;
	}
	form input{
		text-align: center;
	}
	img{
		height: 200px;
		width: 200px;
		align-self: center;
		margin: 5px;
		border: 1px solid gray;
		border-radius: 5%;
	}
	.products{
		display: flex;
		flex-flow: row;
		justify-content:center;
	}
	.cart{
		align-self:center;
		background: lightgray;
		border: 2px solid gray;
		border-radius: 5%;
		padding: 10px;
		text-align: center;
	}
</style>


<?PHP
//INITIALIZATION SCRIPT ====================
// 
//--- errors detection type
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//--- includes
include("cart.php");
include("product.php");
//--- session
session_start();


// MAIN SCRIPT ====================
//
	
	//CREATION OF OBJECTS IN SESSION
	if(empty($_SESSION['spawned'])){
		$_SESSION['spawned'] = true;
		$_SESSION['cart'] = new cart();
		$_SESSION['oeuf'] = new product("oeuf", 1, "http://www.bioalaune.com/img/article/thumb/900x500/10368-oeufs.jpg", 0, $_SESSION['cart']);
		$_SESSION['chocolat'] = new product("chocolat", 3, "http://www.patissermalin.fr/img/cms/choc.jpg", 0, $_SESSION['cart']);
		$_SESSION['Coeur de sanglier'] = new product('Coeur de sanglier', 999, 'https://previews.123rf.com/images/burakowski/burakowski1202/burakowski120200373/12222107-censored-stamp.jpg', 0, $_SESSION['cart']);
		$_SESSION['Voiture de luxe'] = new product('Voiture de luxe', 19999, 'http://images.forum-auto.com/mesimages/406378/3658155.jpg', 0, $_SESSION['cart']);
		$_SESSION['Throne Princier'] = new product('Throne Princier', 1337, 'https://www.fabuloustoilettes.com/wp-content/uploads/wc-seche.jpg', 0, $_SESSION['cart']);
	}
	//DETECTION OF INPUTS		
	//$_POST -- action, product, number are the values to use here
	if(isset($_POST['action'])){
		//test the kind of action
		switch ($_POST['action']){
			//if button delete is pressed
			case 'delete':			
				if(ctype_digit($_POST['number'])){
					$value = strval($_POST['number']);
					$_SESSION[$_POST['name']]->removeFromCart(false,$value);
				}
				break;
			//if button delete all is pressed
			case 'delete all':			
					$_SESSION[$_POST['name']]->removeFromCart(true,0);
				break;
			//if button add is pressed
			case 'add':			
				if(ctype_digit($_POST['number'])){
					$value = strval($_POST['number']);
					$_SESSION[$_POST['name']]->addToCart($value);
				}
				break;
		}
	}
		echo "<div class='products'>";
		foreach ($_SESSION as $key => $value) {
			if(is_a($value, "product")){
				$value->initializeInterface();
			}
		}
		echo "</div>";
		echo "<div class='cart'>";
			echo $_SESSION['cart']->update();
		echo "</div>";
?>


<html> 
<body>
	
</body>
</html>