<?php

require_once('model/deleteModel.php');

function deleteDisc() {

    $disc_id = $_GET['disc_id'];

    $db = dbConnexion();
    $request = $db->query("DELETE FROM disc WHERE disc_id = $disc_id");
    $request->closeCursor();

    header("index.php?action=deleteSuccess");
}