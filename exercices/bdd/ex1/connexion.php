<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=simplon_php;charset=utf8', 'root', '150389ps');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $ex)
    {
        die('Erreur : ' . $ex->getMessage());
    }

?>