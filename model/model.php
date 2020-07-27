<?php

require_once('index.php');

function dbConnexion() {
    
    try {
    
        $db = new PDO("mysql:host=localhost;port=3308;charset=utf8;dbname=record", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } 
    catch (Exception $e) { 
        
        echo 'Erreur : ' . $e->getMessage() . '<br />';
        echo 'N° : ' . $e->getCode();
        die('Fin du script');
    
    }

}


