<!--  
Consigne :

1. Write a function to calculate the factorial of a number (a non-negative integer). The function accepts the number as an argument. 

2. Write a function to check a number is prime or not. 
Note: A prime number (or a prime) is a natural number greater than 1 that has no positive divisors other than 1 and itself.

3. Write a function to reverse a string.
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

	function reverseStr($str){
		$resultStr = "";
		for ($i = strlen($str)-1; $i >= 0 ; $i--) { 
			$resultStr .= $str[$i];
		}
		return "<br />$resultStr";
	}

	echo factorial(7);
	echo testPrime(4);
	echo reverseStr("Cette phrase va etre inversee coucou c'est moi j'ecris un truc super long pour tester !");
?>

