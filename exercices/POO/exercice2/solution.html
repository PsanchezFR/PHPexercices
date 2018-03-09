<?php

// Definition de la classe personnage
class Personnage {
    protected $health;
    protected $attackValue; 
    protected $name;

    // constructeur on defini les variables de la classe avec celles
    // passées lors de l'instanciation
    public function __construct($name,$health) {
        $this->health = $health;
        $this->name = $name;
    }

    // Retourne le nom du personnage
    public function getName() {
        return $this->name;
    }
    
    // Retourne les points de vie du personnage 
    public function getHealth() {
        return $this->health;
    }
    
    // Attaque une victime :
    // Appel la methode qui soustrait la valeur de l'attaque
    // au personnage passé en parametre ($victim)
    public function fight($victim) {
        return $victim->decreaseHealt($this->attackValue);
    }

    // Soustrait la valeur de l'attaque au point de vie
    public function decreaseHealt($value) {
        $this->health = $this->health - $value;
        return $this->health;
    }
}

// Définition de la classe guerrier
class Guerrier extends Personnage {
    protected $attackValue = 15;
}

// Définition de la classe Sorcier
class Sorcier extends Personnage {
    protected $attackValue = 10;
}
?>



<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="Solution exercice 10">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="manifest" href="site.webmanifest">
        <link rel="apple-touch-icon" href="icon.png">
        <!-- Place favicon.ico in the root directory -->
    </head>
    <body>

    </body>
</html>    


<?
// On créer un tableau de combattant vide
$combattants = [];

// On boucle autant de fois qu'il y a des guerriers et 
// on instancie les guerriers avec les informations récoltés du formulaire
for($i=0;$i<5;$i++) {
    $combattants[] = new Guerrier(rand(1000,5000),rand(20,100));
}

// On boucle autant de fois qu'il y a des sorciers et 
// on instancie les sorciers avec les informations récoltés du formulaire
for($i=0;$i<5;$i++) {
    $combattants[] = new Sorcier(rand(1000,5000),rand(20,100));
}


// Tant qu'il reste plus d'un combattant
while(count($combattants) > 1) {
    
    // On recupere les clefs existante du tableau combattant
    // (on fait cela car on unset le combattant lorsqu'il est mort donc il peut y avoir des clefs invalides)    
    // ** Utiliser var_dump() pour afficher l'evolution du tableau durant le jeu pour plus d'infos
    $keys = array_keys($combattants);
    
    // On choisi une clef au hazard dans le tableau keys récupérées
    $rand1 = $keys[rand(0,count($keys) -1)];
    // On supprime la clef séléctionné du tableau clef
    unset($keys[$rand1]);
    
    // On recupere les valeurs du tableau keys et on réecrit le tableau $keys
    // (on fait cela car il faut selectionner deux combattants differents et rand pourrait renvoyer deux fois la meme valeur)
    $keys = array_values($keys);
    // On selectionne une clef au hazard dans le tableau keys    
    $rand2 = $keys[rand(0,count($keys) -1)];    
    
    echo $combattants[$rand1]->getName()." frappe ".$combattants[$rand2]->getName()."<br />";
    // On fait se battre les combattants et on verifie que la health du combattant 2 
    // retourné par fight est inferieur ou egale a 0
    if($combattants[$rand1]->fight($combattants[$rand2]) <=0) {
        echo $combattants[$rand2]->getName()." est mort<br />";
        // Le combattant est mort on l'enleve du tableau $combattants
        unset($combattants[$rand2]);        
    }    
}
echo "Le jeu est fini<br />";
// On recupere les clefs du tableau combattant
$key = array_keys($combattants);
// Il n'en reste plus qu'une donc $key[0] = la seule clef valide du tableau $combattant
echo $combattants[$key[0]]->getName() ." à gagné ";