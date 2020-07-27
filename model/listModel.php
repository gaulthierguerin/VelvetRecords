<?php 

require_once('model/model.php');

function getDiscs() {
    
    $db = dbConnexion();

    $request = $db->query("SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id");
    $list = $request->fetchAll(PDO::FETCH_OBJ);
    $request -> closeCursor();

    return $list;
}


