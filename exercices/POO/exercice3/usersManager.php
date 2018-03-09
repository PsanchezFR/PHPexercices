<?PHP
//CLASSES FOR THE USER MANAGER ====================
// it keeps tracks of users, test connection datas etc.

	//	Only one object of userManager class must exist at a time.
	//
		class userManager {
			//VARIABLES
			//
				private $usersList = [];

			//CONSTRUCTOR
			//	

				public function __construct(){
					
				}

			//METHODS
			//	

			//----Random tools-----
			//

			//----Connection-----
			//
				public function connect($login, $password, $user){
					if(!$user->getIsConnected()){
						if($this->isLoginValid($login) && $this->isPasswordValid($password)){
							$this->trackUser($user)
							$user->setIsConnected(true);
						}
					}
				}

				public function disconnect($user){
					if($user->getIsConnected()){
						$this->untrackUser($user);
						$user->setIsConnected(false);
					}
				}
			//----$usersList manipulations-----
			//	
				//search a user in $userList
				private function searchUser($user){
						if(is_a($user, "user")){
						foreach ($this->usersList as $key => $value) {
							if($value[0] === $user->login){
								return array($value, $key);
							}
						}
						return false;
					}
				}

				//add a user object to $usersList
				private function trackUser($user) {
					$userList[] = $user;
				}

				//unset a user object from $usersList
				private function untrackUser($user){
					$userFound = $this->searchUser($user);	//retrieve datas of $user in $userList
					if(isset($userFound)){
						unset($usersList[$userFound[1]]);	//$userFound[1] = index of this user in usersList
					}
				}

			//----test functions-----
			//	
				private isLoginValid($login){

				}

				private isPasswordValid($password){

				}

				private isConnectionRequestValid($login, $password){

				}

				private isDisconnectionRequestValid($login, $password){

				}
		}
?>