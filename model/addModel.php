<?php

require_once('model/model.php');

function addForm() {
    $db = dbConnexion();

    $request = $db->query("SELECT artist_id, artist_name FROM artist ORDER BY artist_name ASC");
    $artists = $request->FetchAll(PDO::FETCH_OBJ);
    $request->closeCursor();

    addDisc();

    require_once('view/addView.php');
    return $artists;
}


        