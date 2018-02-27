<?php

/**
* Créer une fonction qui verifie qu'une chaine existe dans une autre chaine et retourne
* la position de son premier caractere 
* 
* ne pas utiliser la fonction strpos
* 
* exemple 
* 
* $place = mafunction("machaine", "chaine"); // 3
*/

function posString($chaine,$boutdechaine) {
        
    $result=false;
    for($i=0;$i<strlen($chaine) - 1;$i++) {        
        for($j=0;$j<strlen($boutdechaine) - 1;$j++) {
            if(isset($chaine[$i + $j])) {
                if($chaine[$i + $j] == $boutdechaine[$j]) {                
                    if($result == false) {
                        $result = $i;                
                    }
                }
            }
        }
        
    }
    
    return $result;    
}

var_dump(posString("machaine","chaine"));
var_dump(posString("none","blah"));
var_dump(posString("i wanna touch the sky","touch"));


