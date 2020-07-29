<?php

require_once('model/model.php');

function updateForm() {

    $db = dbConnexion();

    $disc_id = $_POST['disc_id'];

    $request = $db->query("SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id  WHERE disc_id=$disc_id");
    $discInfo = $request->Fetch(PDO::FETCH_OBJ);
    $request->closeCursor();


    require('view/updateView.php');
    return $discInfo;
}
