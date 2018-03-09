<?PHP
//CLASSES FOR THE USER SESSION ====================
// 
	//	interface to force implementation of connection and disconnection
	//	
		interface userInterface {
				//methods to implement in child---------------

				public function userConnect($login, $password);
				public function userDisconnect($user);
				
		}

	//	all data and logic bound to a user (should be stored in database)
	//
		class user implements userInterface {
			//VARIABLES
			//
				private $isConnected = false;

			//CONSTRUCTOR
			//
				public function __construct($login, $password, $firstCart, $usersManager){
					$this->login = $login;					//local reference of login
					$this->password = $password;			//local reference of password
					$this->cartList[] = $firstCart;			//initialize an array of carts
					$this->usersManager = $usersManager;	//local reference to usersManager object
				}

			//METHODS
			//
				//GETTERS---------------
				public function getIsConnected(){
					return $isConnected;
				}

				public function getLogin(){
					return $this->login;
				}

				public function getPassword(){
					return $this->password;
				}

				public function getCartList(){
					return $this->cartList;		//returns an array
				}

				private getUserManager(){
					return $this->usersManager;
				}

				//SETTERS---------------
				public function setIsConnected($newStatus){
					$isConnected = $newStatus;
				}

				public function setLogin($newLogin){
					$this->login = $newLogin;
				}

				public function setPassword($newPassword){
					$this->password = $newPassword;
				}

				//CONNECTION---------------

				//	---- unsure if it could be used or not so I commented it ----
				// 	---- the login request should normally be fired in the usersManager class ----
				//
					// public function userConnect($login, $password){
					// 	$userManager = $this->getUserManager();

					// 	$userManager->connect($login, $password, $this);
					// }

				public function userDisconnect($user){
					$userManager = $this->getUserManager();

					$userManager->disconnect($this);
				}
		}
?>