<?php 

// require('model.php');

function getDiscs() {
    
    try {
    
        $db = new PDO("mysql:host=localhost;port=3308;charset=utf8;dbname=record", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    } 
    catch (Exception $e) { 
        
        echo 'Erreur : ' . $e->getMessage() . '<br />';
        echo 'N° : ' . $e->getCode();
        die('Fin du script');
    
    }

    $request = $db->query("SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id");
    $list = $request->fetchAll(PDO::FETCH_OBJ);
    $request -> closeCursor();

    return $list;
}