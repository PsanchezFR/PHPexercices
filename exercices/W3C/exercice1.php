<!-- 
Consigne :

1. Write a function to calculate the factorial of a number (a non-negative integer). The function accepts the number as an argument. 

2. Write a function to check a number is prime or not. 
Note: A prime number (or a prime) is a natural number greater than 1 that has no positive divisors other than 1 and itself.
-->

<?php 
function factorial(x){
	$result = 0;
	for ($i=0; $i < x; $i++) { 
		x *= $result;
	}
	return $result;
}

function testPrime(x){
	for ($i=0; $i < x ; $i++) { 
		if($i != 1 && $i != x){
			if(x % $i == 0){
				return false;
			}
		}
		return true;
	}
}
?>

