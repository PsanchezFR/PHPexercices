<?PHP //INTERFACES -- ONLY FOR MINIMUM FUNCTIONS AND CONSTANTS ====================
	interface productInterface
	{
			public function addToCart($number);
			public function removeFromCart($all, $number);
	}

//CLASS FOR THE PRODUCT ====================
//

	class product implements productInterface {
		//CONSTANT VARIABLES******
		//
		const maxNumberOfProducts = 99;

		public function __construct($name, $price, $image, $number, $cart){
			if(is_string($name)){
				$this->name = $name;
			}

			if(is_float($price) || is_int($price)){
				$this->price = $price;
			}
			else{
				$this->price = 1;
			}

			if(is_string($image)){
				$this->image = $image;
			}
			if($this->validateInteger($number, "__construct()")){
				$this->currentNumber = $number;
			}
			if($this->validateCart($cart, "__construct()")){
				$this->cart = $cart;
				$this->initializeInCart();
			}
		}

		//METHODS ******
		//

		// CALLED IN CONSTRUCTOR ---------------

		// create the corresponding entry in the cart array of products.
		private function initializeInCart(){
						$cart = $this->cart;
						$cart->addToProductList($this);
		}

		//create interface to add and remove objects from the cart
		public function initializeInterface(){
				echo "<article class='$this->name'>";
					echo "<form action='?' method='post'>";
						echo "<h1>$this->name</h1>";
						echo "<img src='$this->image'>";
						echo "<input class='number' type='text' name='number' value=''></input>";
						echo "<div>";
							echo "<input class='add' type='submit' name='action' value='add'></input>";
							echo "<input class='remove' type='submit' name='action' value='delete'></input>";
							echo "<input class='removeAll' type='submit' name='action' value='delete all'></input>";
							echo "<input class='hidden' type='hidden' name='name' value='$this->name'></input>";
						echo "</div>";
					echo "</form >";
				echo "</article>";
		}


		//GETTERS---------------
		public function getName(){
			return $this->name;
		}

		public function getPrice(){
			return $this->price;
		}

		public function getNumber(){
			return $this->currentNumber;
		}

		//SETTERS---------------

		//set the $number of products
		private function setNumber($number){
			$cart = $this->cart;
			$this->currentNumber = $number;

		}

		//MANIPULATION OF CART---------------

		//addToCart can add a $number of objects from the cart object. 
		public function addToCart($number){
			if(($this->getNumber() + $number) <= product::maxNumberOfProducts){
					//create local references to variables
					$testResult = $this->validateInteger($number, "addToCart");
					$cart = $this->cart;
					//check if $number is valid	
					if($testResult){
						$result = $number + $this->currentNumber; //catch the result of adding current number of product and input
						
						//different actions if under or over 0
						if($this->currentNumber > 0){
							$this->setNumber($result);		//set the new variable
							$cart->changeNumberOfProduct($this);
						}
						else{
							$this->setNumber($number);		//set the new variable
							$cart->addToProductList($this);
							$cart->changeNumberOfProduct($this);
						}
					}
				}
		}

		//removeFromCart can remove $all or a $number of objects from the cart object. 
		public function removeFromCart($all, $number){
				//create local references to variables
				$testResult = $this->validateInteger($number, "removeFromCart");
				$cart = $this->cart;

				//check the parameter $all
				if(is_bool($all) && $all){
					$this->setNumber(0);
					$cart->changeNumberOfProduct($this);
					$cart->removeFromProductList($this);		
				}
				//check if $number is valid	
				if($testResult){														
					$number *= -1;								//set $number to a negative value
					$result = $number + $this->currentNumber; //catch the result of adding current number of product and input

					//different actions if under or over 0
					if($this->currentNumber > 0 && $result > 0){
						$this->setNumber($result);		//set the new variable
						$cart->changeNumberOfProduct($this);
					}
					else{
						$this->setNumber(0);
						$cart->changeNumberOfProduct($this);
						$cart->removeFromProductList($this);
					}
				}
		}

		//TESTS---------------

		//validateParameters should be used for test purpose before modifying the product list
		//$functionName is used for more specific errors.
		public function validateInteger($number, $functionName){
			//is $number a positive integer ?
			if(!is_int($number) && !$number > 0){
				trigger_error("$functionName -- " . '$number should be an int.');
				return false;
			}
			// return the parameters if valid
			return true;
		}

		//validateParameters should be used for test purpose when assigning a new cart
		//$functionName is used for more specific errors.
		public function validateCart($cart, $functionName){
			if(is_a($cart, "cart")){
				return true;	
			}
			trigger_error("$functionName -- " . '$cart is of invalid class ' . get_class($cart));
				return false;
		}

	}
?>
