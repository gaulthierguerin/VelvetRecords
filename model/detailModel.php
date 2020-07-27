<?php

require_once('model/model.php');

function getDiscDetails($disc_id) {
    
    $db = dbConnexion();

    $request = $db->query("SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id  WHERE disc_id=$disc_id");
    $details = $request->Fetch(PDO::FETCH_OBJ);
    $request->closeCursor();

    return $details;
}

