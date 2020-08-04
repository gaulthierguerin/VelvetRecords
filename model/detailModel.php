<?php

require_once('model/model.php');

function getDiscDetails($disc_id) {
    
    $db = dbConnexion();

    $request = $db->query("SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id  WHERE disc_id=$disc_id"); // le disc_id est récupéré en $_GET
    $details = $request->Fetch(PDO::FETCH_OBJ);
    $request->closeCursor();

    $artistRequest = $db->query("SELECT artist_id, artist_name FROM artist ORDER BY artist_name"); // cette query permet de récupérer le nom de l'artiste ensuite
    $artists = $artistRequest->FetchAll(PDO::FETCH_OBJ);
    $artistRequest->closeCursor();


    return $details;
}

