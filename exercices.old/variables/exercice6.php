<?php 

$a = 2;
$b = 8;
$c = $a - $b;
$a2 = "Bonjour";
$b2 = " Nico.";
$t = ["Nico", "Dorra", "Paul"];
$ta = ["prenom" => "Nico"  , "prenom2" => "Dorra", "prenom3" => "Paul"];
const myConst = "test";

echo($t[1] . "<br />");
echo($ta["prenom3"] . "<br />");
echo($c . "<br />");
echo($a2 . $b2);
echo "ceci est un test : " . myConst;

?>