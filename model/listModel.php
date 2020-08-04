<?php 

require_once('model/model.php');

function getDiscs() {
    
    $db = dbConnexion(); //fonction pour se connecter à la base de données, depuis model.php

    $request = $db->query("SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id"); //execution de la requête
    $list = $request->fetchAll(PDO::FETCH_OBJ);//récupération des informations
    $request -> closeCursor();//on ferme la requête pour que d'autres puissent être exécutées

    return $list;
}


