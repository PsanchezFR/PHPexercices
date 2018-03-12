<?PHP
//CLASSES FOR THE USER MANAGER ====================
// it keeps tracks of users, test connection datas etc.

	//	Only one object of userManager class must exist at a time.
	//
		class usersManager {

			//CONSTRUCTOR
			//	
				public static $PDO = "";

				public function __construct(){
					$this->usersList = [];
					$this->connectedUsersList = [];
				}

			//METHODS
			//	

			//----Random tools-----
			//

			//----Database----
			//	
				//create a PDO connection and return it
				public function initializeConnection($host, $dbname, $charset, $user, $password){
					try
					    {	
					        $PDO = new \PDO('mysql:host='.$host.';dbname='.$dbname.';charset='.$charset, "$user", "$password");
					        $PDO->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
					        return $PDO;
					    }
					catch (PDOException $ex)
					    {
					        die('Erreur : ' . $ex->getMessage());
					        return null;
					    }
				}



			//----Connection-----
			//
				public function connect($login, $password){
					$user = $this->searchLogin($login, $this->usersList);
					$user = $user[0];
					if($user){
						if(!$user->getIsConnected()){
							if($this->isConnectionRequestValid($login, $password)){
									$this->trackUser($user);
									return true;
							}
						}
					}
					return false;
				}

				public function disconnect($login){
					$userFound = $this->searchLogin($login, $this->connectedUsersList)[0];
					if($userFound->getIsConnected()){
						$this->untrackUser($userFound);
						return true;
					}
					return false;
				}
			//----$this->usersList manipulations-----
			//	
				//search a user object  in $userList
				private function searchUser($user, $list){
						if(is_a($user, "user")){
						foreach ($list as $key => $value) {
							if($value->login === $user->login){
								return array($value, $key);
							}
						}
						return false;
					}
				}
				//search a user object in $userList by comparing a string to login variable 
				private function searchLogin($login, $list){
						if(is_string($login)){
						foreach ($list as $key => $value) {
							if($login === $value->login){
								return array($value, $key);
							}
						}
						return false;
					}
				}

				//create a user and add it to usersList
				public function addUser($login, $password, $firstCart){
					$this->usersList[] = new user($login, $password, $firstCart, $this);
				}

				//add a user object to $this->connectedUsersList
				private function trackUser($user) {
					if(isset($user) && is_a($user, 'user')){
						$this->connectedUsersList[] = $user;
						$user->setIsConnected(true);
					}
				}

				//unset a user object from $this->connectedUsersList
				private function untrackUser($user){
					$userFound = $this->searchLogin($user, $this->connectedUsersList);	//retrieve datas of $user in $this->connectedUsersList
					if(isset($userFound)){
						unset($this->connectedUsersList[$userFound[1]]);	//$userFound[1] = index of this user in usersList
						$user->setIsConnected(false);
					}
				}

			//----login screen-----
			//
				public function updateConnectionScreen(){
					echo "<form class='connectionScreen' method='post' action='?'>";
						echo "<fieldset>";
							echo "<label><p>LOGIN:</p><input class='loginInput' type='text' name='login' value=''></input></label>";
							echo "<label><p>PASSWORD:</p><input class='passwordInput' type='text' name='password' value=''></input></label>";
							echo "<input class='authenticate' type='submit' name='action' value='authenticate'></input>";
						echo "</fieldset>";
					echo "</form>";
				}

				public function updateUsersBar(){
					echo "<form class='usersBar' method='post' action='?'>";
							echo "<input class='disconnect' type='submit' name='action' value='disconnect'></input>";
					echo "</form>";
				}

			//----test functions-----
			//	
				private function isLoginValid($login){
					if(isset($login) && is_string($login)){
						return true;
					}
					return false;
				}

				private function isPasswordValid($password){
					if(isset($password) && is_string($password)){
						return true;
					}
					return false;
				}

				private function isConnectionRequestValid($login, $password){
					if(isset($login) && is_string($login) && isset($password) && is_string($password)){
						return true;
					}
					return false;
				}

				private function isDisconnectionRequestValid($login, $password){

				}
		}
?>