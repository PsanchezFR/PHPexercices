<?PHP 
//CLASSES FOR THE CART ====================
//

	//	data structure for the cart. 
	//	using abstract because it defines what cart should implement ; it's kind of a more powerful interface
	//
		abstract class cartStructure {
			//CONSTRUCTOR
			public function __construct(){
				$this->productList = [];		//	create an array
			}
			//ABSTRACT METHODS
				//	methods to modify productList
			abstract function addToProductList($product);
			abstract function removeFromProductList($product);
			abstract function changeNumberOfProduct($product);
				//	method to graphically update the cart
			abstract function update(); 
		}

	//	Cart is tasked with graphical and logic stuff
	//
		class cart extends cartStructure{	

			public function __construct(){
				parent::__construct();
				$this->id = random_int(0, 999999);
			}

			//METHODS
			//

			//----Random tools-----
			//
				//	function to search in productList
				//	return an array with [0] = values of product [1]=key
				//	can be used to unset
				public function searchProductList($product){
					if(is_a($product, "product")){
						foreach ($this->productList as $key => $value) {
							if($value[0] === $product->name){
								return array($value, $key);
							}
						}
						return false;
					}
				}
			//----to modify productList-----
			//

				//	add a product to the list of products
				//	should be used when number of products is modified from 0 to 1
				public function addToProductList($product){
					//	if product doesn't exist
					if(!$this->searchProductList($product)){
						$arrayOfValues = [];						//	create new array
						$arrayOfValues[] = $product->getName();		//	push values into it
						$arrayOfValues[] = $product->getNumber();	//
						$arrayOfValues[] = $product->getPrice();	//
						$this->productList[] = $arrayOfValues;		//	push array into productList
					}
				}

				//	search a product in $productList and remove it from the list of products
				//	should be used if product number == 0
				public function removeFromProductList($product){
					$productTarget = $this->searchProductList($product);	//	find a product in the productList[]
					if(isset($productTarget)){								// 	if it exists
						unset($this->productList[$productTarget[1]]);		//	unset it
					}
				}

				//	search a product in $productList and change its value
				//
				public function changeNumberOfProduct($product){
					$arrayOfValues = $this->searchProductList($product);
					//	if product exist
					if($arrayOfValues){
						$arrayOfValues[0][1] = $product->getNumber();
						$this->productList[$arrayOfValues[1]] = $arrayOfValues[0];
					}
				}

			//----graphical functions-----
			//
				public function update(){
					echo "<h2>Cart of current products</h2>";
					echo "cart id : " . $this->id ;
					echo "<table>";

						//	head of table
						echo "<tr>";
							echo "<th>Name of product</th>";
							echo '<th>Number (max: '. product::maxNumberOfProducts .' )</th>';
							echo "<th>Price</th>";
							echo "<th>Total</th>";
						echo "<tr>";

						//	fill the table with products
						$greatTotal = 0;									// setting the big total
						foreach ($this->productList as $key => $value) {
							echo "<tr>";
								echo "<td>" . $value[0] . "</td>";				// name of products
								echo "<td>" . $value[1] . "</td>";				// number of products
								echo "<td>" . $value[2] . "</td>";				// price for one
								echo "<td>" . $value[2]*$value[1] . "</td>";	// total price (price*number)
							echo "<tr>";
							$greatTotal += $value[2]*$value[1];				// calculating the big bad ending total
						}
							//	last line for the total
							echo "<tr>";
								echo "<td></td>";
								echo "<td></td>";
								echo "<td>Total price :</td>";
								echo "<td>". $greatTotal ."</td>";
							echo "<tr>";

					echo "</table>";	
				}
	}
?>