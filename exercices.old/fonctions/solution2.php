<?php

/**
* Créer une fonction qui compte le nombre de caractere dans une chaine
* 
* ne pas utiliser la fonction strlen
*/

function countString($string) {
    $run = true;
    $i=0;
    while($run == true) {
        if(!isset($string[$i])) {
            $run = false;
        } else {
            $i++;    
        }
        
    }
    
    return $i;
}

echo countString("hello world"); // 11