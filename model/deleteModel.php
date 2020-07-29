<?php

require_once('model/model.php');

function deleteDiscConfirm() {
    $db = dbConnexion();

    $disc_id = $_GET['disc_id'];

    $request = $db->query("SELECT * FROM disc  JOIN artist ON disc.artist_id = artist.artist_id WHERE disc_id = $disc_id");
    $discEntry = $request->fetch(PDO::FETCH_OBJ);
    $request->closeCursor();

    require_once('view/deleteView.php');
    return $discEntry;
}