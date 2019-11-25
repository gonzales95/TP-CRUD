<?php

 

try {
    $bdd = new PDO('mysql:host=localhost;dbname=licence', 'root', 'root');
    
} catch (Exception $error) {
   die("Erreur : ".$error->getMessage());
}
   
