<?php

require_once('model/listModel.php');

function discsList() { // fonction appellée depuis mon routeur (index.php)

    $list = getDiscs(); // fonction de listModel.php

    require_once('view/listView.php'); //montre la vue
    return $list; // pour que $list soit utilisable dans la vue
}

