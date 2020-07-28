<?php

require('model/listModel.php');

function discsList() {

    $list = getDiscs();

    require('view/listView.php');
    return $list;
}