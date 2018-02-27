<?php

/**
* Créer une fonction qui test qu'une valeur existe dans un tableau
* 
* ne pas utiliser la fonction in_array
*/


function valueExistsInArray($value, $array) {
    // Par default on considere que la valeur n'est pas dans le tableau.
    $result = false;
    // On parcourt tous les éléments du tableau
    foreach($arrray as $aKey=>$aValue) {
        // Si la valeur courante du tableau ($avalue) est égale a la valeur que l'on cherche
        // On considere que la valeur est dans le tableau et on change $result.
        if($avalue == $value) {
            $result = true;
        }
    }
        
        
    // on retourne le resultat    
    return $result;
}