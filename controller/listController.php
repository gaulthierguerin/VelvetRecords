<?php

require_once('model/listModel.php');

function discsList() {

    $list = getDiscs();

    require_once('view/listView.php');
    return $list;
}

