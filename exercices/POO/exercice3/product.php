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
			const maxNumberOfProducts = 150;	// max number of products is a constant for all products

			public function __construct($name, $price, $image, $number, $cart){
				//TEST IF EACH INFORMATION IS VALID AND AFFECT IT TO LOCAL VARIABLE
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
				// Test using function validateInteger() in this object
				if($this->validateInteger($number, "__construct()")){
					$this->currentNumber = $number;
				}
				// Test using function validateCart() in this object
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

			// create interface to add and remove objects from the cart
			public function initializeInterface(){
					echo "<article class='$this->name'>";				// class : name of product
						echo "<form action='?' method='post'>";
							echo "<h1>$this->name</h1>";				// text : name of product
							echo "<img src='$this->image'>";			// image : image url defined in constructor
							echo "<input class='number' type='text' name='number' value=''></input>";
							echo "<div>";
								echo "<input class='add' type='submit' name='action' value='add'></input>";
								echo "<input class='remove' type='submit' name='action' value='delete'></input>";
								echo "<input class='removeAll' type='submit' name='action' value='delete all'></input>";

								// Hidden input doesn't appear and is used to send the name of product in $_POST
								 
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

			// set the $number of products inside this object
			private function setNumber($number){
				$cart = $this->cart;
				$this->currentNumber = $number;

			}

			//MANIPULATION OF CART---------------

			// addToCart can add a $number of objects from the cart object. 
			public function addToCart($number){
				if(($this->getNumber() + $number) <= product::maxNumberOfProducts){
						// create local references to variables
						$testResult = $this->validateInteger($number, "addToCart");		// test if $number is an INT
						$cart = $this->cart;											// create local reference to assigned cart
						// check if $number is valid	
						if($testResult){
							$result = $number + $this->currentNumber; // catch the result of adding current number of product and input
							
							// different actions if under or over 0
							if($this->currentNumber > 0){
								$this->setNumber($result);					// set the new variable
								$cart->changeNumberOfProduct($this);		// update the number of products in $cart
							}
							else{
								$this->setNumber($number);					// set the new variable
								$cart->addToProductList($this);				// pop the product in product list
								$cart->changeNumberOfProduct($this);		// update the number of products $cart
							}
						}
					}
			}

			// removeFromCart can remove $all or a $number of objects from the cart object. 
			public function removeFromCart($all, $number){
					//create local references to variables
					$testResult = $this->validateInteger($number, "removeFromCart");	//	check if number is an INT
					$cart = $this->cart;												// create local reference to cart

					// check the parameter $all : it is used to remove all the products from list
					if(is_bool($all) && $all){
						$this->setNumber(0);
						$cart->changeNumberOfProduct($this);

						// -- these 2 previous lines are only here for security --

						$cart->removeFromProductList($this);		
					}

					// check if $number is valid	
					if($testResult){														
						$number *= -1;								// set $number to a negative value
						$result = $number + $this->currentNumber; // catch the result of adding current number of product and input

						// if current number and result of operation > 0 set; else remove product
						if($this->currentNumber > 0 && $result > 0){
							$this->setNumber($result);		//set the new variable
							$cart->changeNumberOfProduct($this);
						}
						else{
							$this->setNumber(0);					// set number local variable
							$cart->changeNumberOfProduct($this);	// change product number in the cart

							// -- these 2 previous lines are only here for security --

							$cart->removeFromProductList($this);	//
						}
					}
			}

			//TESTS---------------

			// validateInteger should be used for test purpose before modifying the product list
			// $functionName is used for more specific errors informations.
			public function validateInteger($number, $functionName){
				// is $number a positive integer ?
				if(!is_int($number) && !$number > 0){
					trigger_error("$functionName -- " . '$number should be an int.');
					return false;
				}
				// return the parameters if valid
				return true;
			}

			//  validateCart should be used for test purpose when assigning a new cart
			//  $functionName is used for more specific errors informations.
			public function validateCart($cart, $functionName){
				if(is_a($cart, "cart")){
					return true;	
				}
				trigger_error("$functionName -- " . '$cart is of invalid class ' . get_class($cart));
					return false;
			}

	}
?>
