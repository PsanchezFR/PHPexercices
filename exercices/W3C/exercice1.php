<!--  
Consigne :

1. Write a function to calculate the factorial of a number (a non-negative integer). The function accepts the number as an argument. 

2. Write a function to check a number is prime or not. 
Note: A prime number (or a prime) is a natural number greater than 1 that has no positive divisors other than 1 and itself.
 -->

<?php 
	function testPrime($x){
		for ($i=1; $i < $x ; $i++) { 
			if($i !== 1){
				if($x % $i == 0){
					return 0;
				}
			}
		}
		return 1;
	}

	function factorial($x){
		$result = 1;

		if($x == 0)
		{
			return 1;
		}

		for ($i=1; $i <= $x; $i++) 
		{ 
			$result *= $i;
		}
		return "Le résultat de $x est $result <br />";
	}

	echo factorial(7);
	echo testPrime(4);
?>

